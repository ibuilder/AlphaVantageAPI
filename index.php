<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Companies Data</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
<style>
table tr td:first-child {
    font-weight: bold;
}
form {
    padding: 10px;

}
</style>
</head>
<body>
<div class="container-fluid">
    <h1>Company Lookup</h1>
    <form class="form-inline">
    <div class="form-group">
        <label for="symbol">Company Symbol</label> &nbsp;
        <input type="text" class="form-control" id="symbol" /> &nbsp;
        <button type="button" class="party btn btn-secondary">Submit</button>
    </div>
    </form>
        <div id="wrapper">
            <hr>

        <!-- Nav tabs -->
            <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active btn-primary" data-toggle="tab" href="#overviewTab">OVERVIEW</a>
            </li>&nbsp;
            <li class="nav-item">
                <a class="nav-link btn btn-secondary" data-toggle="tab" href="#balanceTab">BALANCE SHEET</a>
            </li>&nbsp;
            <li class="nav-item">
                <a class="nav-link btn btn-secondary" data-toggle="tab" href="#incomeTab">INCOME STATEMENT</a>
            </li>&nbsp;
            <li class="nav-item">
                <a class="nav-link btn btn-secondary" data-toggle="tab" href="#cashTab">CASH FLOW</a>
            </li>
            
            </ul>
            <br>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="overviewTab">
                    <div class="table-responsive table-bordered table-striped">
                        <form class="text-align:right" method="post" action="createExcel.php" target="_blank">
                            <input name="name" id="name" style="display:none;" value="Overview Sheet" />
                            <textarea id="overviewReportHeaders" name="headers" style="display:none"></textarea>
                            <textarea id="overviewReportValues" name="values" style="display:none"></textarea>
                            <input class="btn btn-sm btn-secondary pull-right" type="submit" value="Download Report"/>
                        </form>
                        <!--<div style="width:50%;">
                            <canvas id="canvasOverview"></canvas>
                        </div>-->  
                        <table class="table" id="overview">
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="balanceTab">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active btn-primary" data-toggle="tab" href="#balanceAnnuallyTab">Annually</a>
                        </li>&nbsp;
                        <li class="nav-item">
                            <a class="nav-link btn btn-secondary" data-toggle="tab" href="#balanceQuaterlyTab">Quaterly</a>
                        </li>&nbsp;
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="balanceAnnuallyTab">
                            <div class="table-responsive table-bordered table-striped">
                                <form class="text-align:right" method="post" action="createExcel.php" target="_blank">
                                    <input name="name" id="name" style="display:none;" value="Balance Sheet Annually" />
                                    <textarea id="balanceAnnuallyReportHeaders" name="headers" style="display:none"></textarea>
                                    <textarea id="balanceAnnuallyReportValues" name="values" style="display:none"></textarea>
                                    <input class="btn btn-sm btn-secondary pull-right" type="submit" value="Download Report"/>
                                </form>
                                <div style="width:50%;">
                                    <canvas id="canvasBalanceAnnually"></canvas>
                                </div>
                                <table class="table" id="balanceAnnual">
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="balanceQuaterlyTab">
                            <div class="table-responsive table-bordered table-striped">
                                <form class="text-align:right" method="post" action="createExcel.php">
                                    <input name="name" id="name" style="display:none;" value="Balance Sheet Quaterly" />
                                    <textarea id="balanceQuaterlyReportHeaders" name="headers" style="display:none"></textarea>
                                    <textarea id="balanceQuaterlyReportValues" name="values" style="display:none"></textarea>
                                    <input class="btn btn-sm btn-secondary pull-right" type="submit" value="Download Report"/>
                                </form>
                                <div style="width:50%;">
                                    <canvas id="canvasBalanceQuaterly"></canvas>
                                </div>
                                <table class="table" id="balanceQuaterly">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="incomeTab">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active btn-primary" data-toggle="tab" href="#incomeAnnuallyTab">Annually</a>
                        </li>&nbsp;
                        <li class="nav-item">
                            <a class="nav-link btn btn-secondary" data-toggle="tab" href="#incomeQuaterlyTab">Quaterly</a>
                        </li>&nbsp;
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="incomeAnnuallyTab">
                            <form class="text-align:right" method="post" action="createExcel.php">
                                <input name="name" id="name" style="display:none;" value="Income Sheet Annually" />
                                <textarea id="incomeAnnuallyReportHeaders" name="headers" style="display:none"></textarea>
                                <textarea id="incomeAnnuallyReportValues" name="values" style="display:none"></textarea>
                                <input class="btn btn-sm btn-secondary pull-right" type="submit" value="Download Report"/>
                            </form>
                            <div style="width:50%;">
                                <canvas id="canvasIncomeAnnually"></canvas>
                            </div>
                            <div class="table-responsive table-bordered table-striped">
                                <table class="table" id="incomeAnnual">
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="incomeQuaterlyTab">
                            <form class="text-align:right" method="post" action="createExcel.php">
                                <input name="name" id="name" style="display:none;" value="Income Sheet Quaterly" />
                                <textarea id="incomeQuaterlyReportHeaders" name="headers" style="display:none"></textarea>
                                <textarea id="incomeQuaterlyReportValues" name="values" style="display:none"></textarea>
                                <input class="btn btn-sm btn-secondary pull-right" type="submit" value="Download Report"/>
                            </form>
                            <div style="width:50%;">
                                <canvas id="canvasIncomeQuaterly"></canvas>
                            </div>
                            <div class="table-responsive table-bordered table-striped">
                                <table class="table" id="incomeQuaterly">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="cashTab">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active btn-primary" data-toggle="tab" href="#cashAnnuallyTab">Annually</a>
                        </li>&nbsp;
                        <li class="nav-item">
                            <a class="nav-link btn btn-secondary" data-toggle="tab" href="#cashQuaterlyTab">Quaterly</a>
                        </li>&nbsp;
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="cashAnnuallyTab">
                            <form class="text-align:right" method="post" action="createExcel.php">
                                <input name="name" id="name" style="display:none;" value="Cash Flow Sheet Annually" />
                                <textarea id="cashAnnuallyReportHeaders" name="headers" style="display:none"></textarea>
                                <textarea id="cashAnnuallyReportValues" name="values" style="display:none"></textarea>
                                <input class="btn btn-sm btn-secondary pull-right" type="submit" value="Download Report"/>
                            </form>
                            <div style="width:50%;">
                                <canvas id="canvasCashAnnually"></canvas>
                            </div>
                            <div class="table-responsive table-bordered table-striped">
                                <table class="table" id="cashAnnual">
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="cashQuaterlyTab">
                            <form class="text-align:right" method="post" action="createExcel.php">
                                <input name="name" id="name" style="display:none;" value="Cash Flow Sheet Quaterly" />
                                <textarea id="cashQuaterlyReportHeaders" name="headers" style="display:none"></textarea>
                                <textarea id="cashQuaterlyReportValues" name="values" style="display:none"></textarea>
                                <input class="btn btn-sm btn-secondary pull-right" type="submit" value="Download Report"/>
                            </form>
                            <div style="width:50%;">
                                <canvas id="canvasCashQuaterly"></canvas>
                            </div>
                            <div class="table-responsive table-bordered table-striped">
                                <table class="table" id="cashQuaterly">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div><center>Company financial information provided by <a href="https://www.alphavantage.co/" target="_blank">AlphaVantage</a></center></div>
    </div>
</div>

<script>
var api_key = 'OC2BKYB9W11O7SBA';  //add API key here
var symbol = $('#symbol').val();
function getOverview(){
    $.ajax({
        url:'https://www.alphavantage.co/query?function=OVERVIEW&symbol='+symbol+'&apikey='+api_key,
        beforeSend:function(){
            $('#overview').html('');
        },
        success: function(data){
            var arr = {};
            var keys = Object.keys(data);
            $('#overviewReportHeaders').val(JSON.stringify(keys));
            arr[0] = data;
            $('#overviewReportValues').val(JSON.stringify(arr));
            $.each(data,function(index,value){
                overview = '<tr><td>'+index+'</td><td>'+value+'</td></tr>';
                $('#overview').append(overview);
            });
        }
    });
}
function getBalance(){
    $.ajax({
        url:'https://www.alphavantage.co/query?function=BALANCE_SHEET&symbol='+symbol+'&apikey='+api_key,
        beforeSend:function(){
            $('#balanceAnnual').html('');
            $('#balanceQuaterly').html('');
        },
        success: function(data){
            var keys = Object.keys(data.annualReports[0]);
            
            var keys2 = Object.keys(data.quarterlyReports[0]);
            var annual = data.annualReports;
            var quaterly = data.quarterlyReports;
            // excel form
            $('#balanceAnnuallyReportHeaders').val(JSON.stringify(keys));
            $('#balanceQuaterlyReportHeaders').val(JSON.stringify(keys2));
            $('#balanceAnnuallyReportValues').val(JSON.stringify(annual));
            $('#balanceQuaterlyReportValues').val(JSON.stringify(quaterly));
            
            var trs = '';
            $.each(keys,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            $('#balanceAnnual').html(trs);
            $.each(keys,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            $('#balanceAnnual').html(trs);
            
            var AnnualLabels = [];
            var AnnualAssets = [];
            var AnnualLiability = [];
            $.each(annual,function(index,value){
                $.each(keys,function(key,val){
                    if(val == "fiscalDateEnding"){
                        AnnualLabels.push(value[val]);
                    }
                    if(val == "totalCurrentLiabilities"){
                        AnnualLiability.push(value[val]);
                    }
                    if(val == "totalCurrentAssets"){
                        AnnualAssets.push(value[val]);
                    }
                    html = '<td>'+value[val]+'</td>';
                    $("#balanceAnnual #"+val).append(html);
                });
            });

            AnnualLabels.reverse();
            AnnualAssets.reverse();
            AnnualLiability.reverse();
            var AnnualConfig = {
                type: 'line',
                data: {
                    labels: AnnualLabels,
                    datasets: [{
                        label: 'Assets',
                        backgroundColor: "rgb(255, 99, 132)",
                        borderColor: "rgb(255, 99, 132)",
                        data: AnnualAssets,
                        fill: false,
                    }, {
                        label: 'Liabilities',
                        fill: false,
                        backgroundColor: "rgb(54, 162, 235)",
                        borderColor: "rgb(54, 162, 235)",
                        data: AnnualLiability,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Balance Annually Chart'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Date'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'USD'
                            }
                        }]
                    }
                }
            };

            var ctx = document.getElementById('canvasBalanceAnnually').getContext('2d');
            window.myLine = new Chart(ctx, AnnualConfig);




            
            var trs = '';
            $.each(keys2,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            $('#balanceQuaterly').html(trs);
            $.each(keys2,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            $('#balanceQuaterly').html(trs);
            
            var QuaterlyLabels = [];
            var QuaterlyAssets = [];
            var QuaterlyLiability = [];
            $.each(quaterly,function(index,value){
                $.each(keys2,function(key,val){
                    if(val == "fiscalDateEnding"){
                        QuaterlyLabels.push(value[val]);
                    }
                    if(val == "totalCurrentLiabilities"){
                        QuaterlyLiability.push(value[val]);
                    }
                    if(val == "totalCurrentAssets"){
                        QuaterlyAssets.push(value[val]);
                    }
                    html = '<td>'+value[val]+'</td>';
                    $("#balanceQuaterly #"+val).append(html);
                });
            });

            QuaterlyLabels.reverse();
            QuaterlyAssets.reverse();
            QuaterlyLiability.reverse();

            var QuaterlyConfig = {
                type: 'line',
                data: {
                    labels: QuaterlyLabels,
                    datasets: [{
                        label: 'Assets',
                        backgroundColor: "rgb(255, 99, 132)",
                        borderColor: "rgb(255, 99, 132)",
                        data: QuaterlyAssets,
                        fill: false,
                    }, {
                        label: 'Liabilities',
                        fill: false,
                        backgroundColor: "rgb(54, 162, 235)",
                        borderColor: "rgb(54, 162, 235)",
                        data: QuaterlyLiability,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Balance Quaterly Chart'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Date'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'USD'
                            }
                        }]
                    }
                }
            };

            var ctx = document.getElementById('canvasBalanceQuaterly').getContext('2d');
            window.myLine = new Chart(ctx, QuaterlyConfig);


        },
        timeout: 30000
    });
    
}
function getIncome(){
    $.ajax({
        url:'https://www.alphavantage.co/query?function=INCOME_STATEMENT&symbol='+symbol+'&apikey='+api_key,
        beforeSend:function(){
            $('#incomeAnnual').html('');
            $('#incomeQuaterly').html('');
        },
        success: function(data){
            var keys = Object.keys(data.annualReports[0]);
            var keys2 = Object.keys(data.quarterlyReports[0]);
            var annual = data.annualReports;
            var quaterly = data.quarterlyReports;

            // excel form
            $('#incomeAnnuallyReportHeaders').val(JSON.stringify(keys));
            $('#incomeQuaterlyReportHeaders').val(JSON.stringify(keys2));
            $('#incomeAnnuallyReportValues').val(JSON.stringify(annual));
            $('#incomeQuaterlyReportValues').val(JSON.stringify(quaterly));
            
            var trs = '';
            $.each(keys,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            $('#incomeAnnual').html(trs);
            
            var AnnualLabels = [];
            var AnnualAssets = [];
            var AnnualLiability = [];
            $.each(annual,function(index,value){
                $.each(keys,function(key,val){
                    if(val == "fiscalDateEnding"){
                        AnnualLabels.push(value[val]);
                    }
                    if(val == "totalRevenue"){
                        AnnualLiability.push(value[val]);
                    }
                    if(val == "netIncome"){
                        AnnualAssets.push(value[val]);
                    }
                    html = '<td>'+value[val]+'</td>';
                    $("#incomeAnnual #"+val).append(html);
                });
            });


            AnnualLabels.reverse();
            AnnualAssets.reverse();
            AnnualLiability.reverse();
            var AnnualConfig = {
                type: 'line',
                data: {
                    labels: AnnualLabels,
                    datasets: [{
                        label: 'Revenue',
                        backgroundColor: "rgb(255, 99, 132)",
                        borderColor: "rgb(255, 99, 132)",
                        data: AnnualAssets,
                        fill: false,
                    }, {
                        label: 'Income',
                        fill: false,
                        backgroundColor: "rgb(54, 162, 235)",
                        borderColor: "rgb(54, 162, 235)",
                        data: AnnualLiability,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Income Annually Chart'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Date'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'USD'
                            }
                        }]
                    }
                }
            };

            var ctx = document.getElementById('canvasIncomeAnnually').getContext('2d');
            window.myLine = new Chart(ctx, AnnualConfig);



            var trs = '';
            $.each(keys2,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            $('#incomeQuaterly').html(trs);
            $.each(keys2,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            
            $('#incomeQuaterly').html(trs);

            var QuaterlyLabels = [];
            var QuaterlyAssets = [];
            var QuaterlyLiability = [];
            $.each(quaterly,function(index,value){
                $.each(keys2,function(key,val){
                    if(val == "fiscalDateEnding"){
                        QuaterlyLabels.push(value[val]);
                    }
                    if(val == "totalRevenue"){
                        QuaterlyLiability.push(value[val]);
                    }
                    if(val == "netIncome"){
                        QuaterlyAssets.push(value[val]);
                    }
                    html = '<td>'+value[val]+'</td>';
                    $("#incomeQuaterly #"+val).append(html);
                });
            });

            QuaterlyLabels.reverse();
            QuaterlyAssets.reverse();
            QuaterlyLiability.reverse();

            var QuaterlyConfig = {
                type: 'line',
                data: {
                    labels: QuaterlyLabels,
                    datasets: [{
                        label: 'Revenue',
                        backgroundColor: "rgb(255, 99, 132)",
                        borderColor: "rgb(255, 99, 132)",
                        data: QuaterlyAssets,
                        fill: false,
                    }, {
                        label: 'Income',
                        fill: false,
                        backgroundColor: "rgb(54, 162, 235)",
                        borderColor: "rgb(54, 162, 235)",
                        data: QuaterlyLiability,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Income Quaterly Chart'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Date'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'USD'
                            }
                        }]
                    }
                }
            };

            var ctx = document.getElementById('canvasIncomeQuaterly').getContext('2d');
            window.myLine = new Chart(ctx, QuaterlyConfig);
        },
        timeout: 30000
    });
}
function getCash(){
    $.ajax({
        url:'https://www.alphavantage.co/query?function=CASH_FLOW&symbol='+symbol+'&apikey='+api_key,
        beforeSend:function(){
            $('#cashAnnual').html('');
            $('#cashQuaterly').html('');
        },
        success: function(data){
            var keys = Object.keys(data.annualReports[0]);
            var keys2 = Object.keys(data.quarterlyReports[0]);
            var annual = data.annualReports;
            var quaterly = data.quarterlyReports;

            // excel form
            $('#cashAnnuallyReportHeaders').val(JSON.stringify(keys));
            $('#cashQuaterlyReportHeaders').val(JSON.stringify(keys2));
            $('#cashAnnuallyReportValues').val(JSON.stringify(annual));
            $('#cashQuaterlyReportValues').val(JSON.stringify(quaterly));
            
            var trs = '';
            $.each(keys,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            $('#cashAnnual').html(trs);

            var AnnualLabels = [];
            var AnnualAssets = [];
            var AnnualLiability = [];
            $.each(annual,function(index,value){
                $.each(keys,function(key,val){
                    if(val == "fiscalDateEnding"){
                        AnnualLabels.push(value[val]);
                    }
                    if(val == "operatingCashflow"){
                        AnnualLiability.push(value[val]);
                    }
                    if(val == "capitalExpenditures"){
                        AnnualAssets.push(value[val]);
                    }
                    html = '<td>'+value[val]+'</td>';
                    $("#cashAnnual #"+val).append(html);
                });
            });

            AnnualLabels.reverse();
            AnnualAssets.reverse();
            AnnualLiability.reverse();
            var AnnualConfig = {
                type: 'line',
                data: {
                    labels: AnnualLabels,
                    datasets: [{
                        label: 'Operating Cash Flow',
                        backgroundColor: "rgb(255, 99, 132)",
                        borderColor: "rgb(255, 99, 132)",
                        data: AnnualAssets,
                        fill: false,
                    }, {
                        label: 'Expenditures',
                        fill: false,
                        backgroundColor: "rgb(54, 162, 235)",
                        borderColor: "rgb(54, 162, 235)",
                        data: AnnualLiability,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Cash Flow Annually Chart'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Date'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'USD'
                            }
                        }]
                    }
                }
            };

            var ctx = document.getElementById('canvasCashAnnually').getContext('2d');
            window.myLine = new Chart(ctx, AnnualConfig);

            var trs = '';
            $.each(keys2,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            $('#cashQuaterly').html(trs);
            $.each(keys2,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            
            $('#cashQuaterly').html(trs);

            var QuaterlyLabels = [];
            var QuaterlyAssets = [];
            var QuaterlyLiability = [];
            $.each(quaterly,function(index,value){
                $.each(keys2,function(key,val){
                    if(val == "fiscalDateEnding"){
                        QuaterlyLabels.push(value[val]);
                    }
                    if(val == "operatingCashflow"){
                        QuaterlyLiability.push(value[val]);
                    }
                    if(val == "capitalExpenditures"){
                        QuaterlyAssets.push(value[val]);
                    }
                    html = '<td>'+value[val]+'</td>';
                    $("#cashQuaterly #"+val).append(html);
                });
            });

            QuaterlyLabels.reverse();
            QuaterlyAssets.reverse();
            QuaterlyLiability.reverse();

            var QuaterlyConfig = {
                type: 'line',
                data: {
                    labels: QuaterlyLabels,
                    datasets: [{
                        label: 'Operating Cash Flow',
                        backgroundColor: "rgb(255, 99, 132)",
                        borderColor: "rgb(255, 99, 132)",
                        data: QuaterlyAssets,
                        fill: false,
                    }, {
                        label: 'Expenditures',
                        fill: false,
                        backgroundColor: "rgb(54, 162, 235)",
                        borderColor: "rgb(54, 162, 235)",
                        data: QuaterlyLiability,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Cash Flow Quaterly Chart'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Date'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'USD'
                            }
                        }]
                    }
                }
            };

            var ctx = document.getElementById('canvasCashQuaterly').getContext('2d');
            window.myLine = new Chart(ctx, QuaterlyConfig);
        },
        timeout: 30000
    });
}
$('.party').click(function(){
    symbol = $('#symbol').val();
    getOverview();
    getBalance();
    getIncome();
    getCash();
});

function format (labelValue) 
{
    // Nine Zeroes for Billions
    return Math.abs(Number(labelValue)) >= 1.0e+9

    ? Math.abs(Number(labelValue)) / 1.0e+9 + "B"
    // Six Zeroes for Millions 
    : Math.abs(Number(labelValue)) >= 1.0e+6

    ? Math.abs(Number(labelValue)) / 1.0e+6 + "M"
    // Three Zeroes for Thousands
    : Math.abs(Number(labelValue)) >= 1.0e+3

    ? Math.abs(Number(labelValue)) / 1.0e+3 + "K"

    : Math.abs(Number(labelValue));
}
</script>


<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>