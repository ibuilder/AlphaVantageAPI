<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Companies Data</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="overviewTab">
                    <div class="table-responsive table-bordered table-striped">
                        <table class="table" id="overview">
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="balanceTab">
                    <h3>Annual</h3>
                    <div class="table-responsive table-bordered table-striped">
                        <table class="table" id="balanceAnnual">
                        </table>
                    </div>
                    <h3>Quaterly</h3>
                    <div class="table-responsive table-bordered table-striped">
                        <table class="table" id="balanceQuaterly">
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="incomeTab">
                    <h3>Annual</h3>
                    <div class="table-responsive table-bordered table-striped">
                        <table class="table" id="incomeAnnual">
                        </table>
                    </div>
                    <h3>Quaterly</h3>
                    <div class="table-responsive table-bordered table-striped">
                        <table class="table" id="incomeQuaterly">
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="cashTab">
                    <h3>Annual</h3>
                    <div class="table-responsive table-bordered table-striped">
                        <table class="table" id="cashAnnual">
                        </table>
                    </div>
                    <h3>Quaterly</h3>
                    <div class="table-responsive table-bordered table-striped">
                        <table class="table" id="cashQuaterly">
                        </table>
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
            var trs = '';
            $.each(keys,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            $('#balanceAnnual').html(trs);
            $.each(keys,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            
            $('#balanceAnnual').html(trs);
            $.each(annual,function(index,value){
                $.each(keys,function(key,val){
                    html = '<td>'+value[val]+'</td>';
                    $("#balanceAnnual #"+val).append(html);
                });
            });

            
            var trs = '';
            $.each(keys2,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            $('#balanceQuaterly').html(trs);
            $.each(keys2,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            
            $('#balanceQuaterly').html(trs);
            $.each(quaterly,function(index,value){
                $.each(keys2,function(key,val){
                    html = '<td>'+value[val]+'</td>';
                    $("#balanceQuaterly #"+val).append(html);
                });
            });


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
            var trs = '';
            $.each(keys,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            $('#incomeAnnual').html(trs);
            $.each(annual,function(index,value){
                $.each(keys,function(key,val){
                    html = '<td>'+value[val]+'</td>';
                    $("#incomeAnnual #"+val).append(html);
                });
            });


            var trs = '';
            $.each(keys2,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            $('#incomeQuaterly').html(trs);
            $.each(keys2,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            
            $('#incomeQuaterly').html(trs);
            $.each(quaterly,function(index,value){
                $.each(keys2,function(key,val){
                    html = '<td>'+value[val]+'</td>';
                    $("#incomeQuaterly #"+val).append(html);
                });
            });
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
            var trs = '';
            $.each(keys,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            $('#cashAnnual').html(trs);
            $.each(annual,function(index,value){
                $.each(keys,function(key,val){
                    html = '<td>'+value[val]+'</td>';
                    $("#cashAnnual #"+val).append(html);
                });
            });


            var trs = '';
            $.each(keys2,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            $('#cashQuaterly').html(trs);
            $.each(keys2,function(index,key){
                trs += "<tr id="+key+"><td>"+key+"</td></tr>"
            });
            
            $('#cashQuaterly').html(trs);
            $.each(quaterly,function(index,value){
                $.each(keys2,function(key,val){
                    html = '<td>'+value[val]+'</td>';
                    $("#cashQuaterly #"+val).append(html);
                });
            });
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
</script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>