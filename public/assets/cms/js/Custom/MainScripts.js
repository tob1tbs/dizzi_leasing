$(document ).ready(function() {
    GetUserStatistic();
    GetLoanStatistic();
});

function GetUserStatistic() {
    $.ajax({
        dataType: 'json',
        url: "/cms/ajax/ajaxGetMonthRegisteredUsers",
        type: "GET",
        data: {
            statistic_month: $("#statistic_month").val(),
            statistic_year: $("#statistic_year").val(),
        },
        success: function(data) {
            const DayArray = [];
            const UserArray = [];

            $.each(data['UserCountArray'], function(key, value){
                DayArray.push(key);
            });
            
            $.each(data['UserCountArray'], function(key, value){
                UserArray.push(value);
            });

            var set_data;
            if(data['status'] == true) {
                var salesOverview = {
                    labels: DayArray,
                    dataUnit: "",
                    lineTension: 0.3,
                    datasets: [
                        {
                            label: "Sales Overview",
                            color: "#798bff",
                            background: NioApp.hexRGB("#798bff", 0.35),
                            data: UserArray,
                        },
                    ],
                };
                var $selector = $(".sales-overview-chart");
                $selector.each(function () {
                    for (
                        var $self = $(this), _self_id = $self.attr("id"), _get_data = void 0 === set_data ? eval(_self_id) : set_data, selectCanvas = document.getElementById(_self_id).getContext("2d"), chart_data = [], i = 0;
                        i < _get_data.datasets.length;
                        i++
                    )
                        chart_data.push({
                            label: _get_data.datasets[i].label,
                            tension: _get_data.lineTension,
                            backgroundColor: _get_data.datasets[i].background,
                            borderWidth: 4,
                            borderColor: _get_data.datasets[i].color,
                            pointBorderColor: "transparent",
                            pointBackgroundColor: "transparent",
                            pointHoverBackgroundColor: "#fff",
                            pointHoverBorderColor: _get_data.datasets[i].color,
                            pointBorderWidth: 2,
                            pointHoverRadius: 3,
                            pointHoverBorderWidth: 2,
                            pointRadius: 3,
                            pointHitRadius: 3,
                            data: _get_data.datasets[i].data,
                        });
                    var chart = new Chart(selectCanvas, {
                        type: "line",
                        data: { labels: _get_data.labels, datasets: chart_data },
                        options: {
                            legend: { display: _get_data.legend || !1, rtl: NioApp.State.isRTL, labels: { boxWidth: 30, padding: 20, fontColor: "#6783b8" } },
                            maintainAspectRatio: !1,
                            tooltips: {
                                enabled: !0,
                                rtl: NioApp.State.isRTL,
                                callbacks: {
                                    title: function (t, e) {
                                        return e.labels[t[0].index];
                                    },
                                    label: function (t, e) {
                                        return e.datasets[t.datasetIndex].data[t.index] + " " + _get_data.dataUnit;
                                    },
                                },
                                backgroundColor: "#eff6ff",
                                titleFontSize: 13,
                                titleFontColor: "#6783b8",
                                titleMarginBottom: 6,
                                bodyFontColor: "#9eaecf",
                                bodyFontSize: 12,
                                bodySpacing: 4,
                                yPadding: 10,
                                xPadding: 10,
                                footerMarginTop: 0,
                                displayColors: !1,
                            },
                            scales: {
                                yAxes: [
                                    {
                                        display: !0,
                                        stacked: _get_data.stacked || !1,
                                        position: NioApp.State.isRTL ? "right" : "left",
                                        ticks: {
                                            beginAtZero: true,
                                            fontSize: 11,
                                            fontColor: "#9eaecf",
                                            padding: 10,
                                            callback: function (t, e, a) {
                                                return t;
                                            },
                                            min: 0,
                                            max: data['TotalUserCount'],
                                            stepSize: 1e1,
                                        },
                                        gridLines: { color: NioApp.hexRGB("#526484", 0.2), tickMarkLength: 0, zeroLineColor: NioApp.hexRGB("#526484", 0.2) },
                                    },
                                ],
                                xAxes: [
                                    {
                                        display: !0,
                                        stacked: _get_data.stacked || !1,
                                        ticks: { fontSize: 9, fontColor: "#9eaecf", source: "auto", padding: 10, reverse: NioApp.State.isRTL },
                                        gridLines: { color: "transparent", tickMarkLength: 0, zeroLineColor: "transparent" },
                                    },
                                ],
                            },
                        },
                    });
                });
            }
        }
    });
}

function RegisterUserChange() {
    GetUserStatistic();
}

function GetLoanStatistic() {

}

function LoanChange() {
    GetLoanStatistic();
}