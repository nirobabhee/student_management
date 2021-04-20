<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$student->first_name}} fee {{date('m-y')}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body onload="window.print()">
    <div class="container" style="width: 800px;height:100vh">
            <div>
                <span style="float: right">
                    Student Copy
                </span>
            </div>
            <br>
            <br>

            <div class="row">
                <div class="col-md-6">
                    <span>
                        Receipt No: {{implode('',explode('-',$student->dob)).$student->id}}{{date('my')}}
                    </span>
                    <br>
                    Student Name {{$student->first_name." ".$student->last_name}}
                    <br>
                    Class {{$student->class}}
                    <br>
                    Section {{$student->class_section}}
                </div>
                <div class="col-md-6">
                    <span  style="float: right">
                        Date: {{date('d-m-y')}}
                        <br>
                        Gender {{$student->gender}}
                        <br>
                        Student ID {{implode('',explode('-',$student->dob)).$student->id}}
                        <br>
                        Session {{$student->session}}
                        <br>
                    </span>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SI No</th>
                        <th>Particular</th>
                        <th>Amount(TK)</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($fees as $fee)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$fee->name}}</td>
                            <td style="text-align: right">{{$fee->price}}</td>
                        </tr>
                        @php($i++)
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th style="text-align: right" colspan="2">Total</th>
                        <th style="text-align: right">{{$fees->sum('price')}}</th>
                    </tr>
                    <tr>
                        <th colspan="3" style="text-align: center">
                           {{$total}} 
                        </th>
                    </tr>
                </tfoot>
            </table>
            <br>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <span style="border-top:1px dotted black">
                        Depositor Signature
                    </span>
                    <br>
                    Mobile No 01746537821
                </div>
                <div class="col-md-4">
                    <span style="">
                        Bank 
                        Seal
                    </span>
                </div>
                <div class="col-md-4">
                    <span style="border-top:1px dotted black">
                            Bank Officer Signature
                        </span>
                </div>
            </div>
    </div>
    <div class="container" style="width: 800px;height:100vh">
        <div>
            <span style="float: right">
                Bank Copy
            </span>
        </div>
        <br>
        <br>

        <div class="row">
            <div class="col-md-6">
                <span>
                    Receipt No: {{implode('',explode('-',$student->dob)).$student->id}}{{date('my')}}
                </span>
                <br>
                Student Name {{$student->first_name." ".$student->last_name}}
                <br>
                Class {{$student->class}}
                <br>
                Section {{$student->class_section}}
            </div>
            <div class="col-md-6">
                <span  style="float: right">
                    Date: {{date('d-m-y')}}
                    <br>
                    Gender {{$student->gender}}
                    <br>
                    Student ID {{implode('',explode('-',$student->dob)).$student->id}}
                    <br>
                    Session {{$student->session}}
                    <br>
                </span>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SI No</th>
                    <th>Particular</th>
                    <th>Amount(TK)</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @foreach($fees as $fee)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$fee->name}}</td>
                        <td style="text-align: right">{{$fee->price}}</td>
                    </tr>
                    @php($i++)
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th style="text-align: right" colspan="2">Total</th>
                    <th style="text-align: right">{{$fees->sum('price')}}</th>
                </tr>
                <tr>
                    <th colspan="3" style="text-align: center">
                       {{$total}} 
                    </th>
                </tr>
            </tfoot>
        </table>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4">
                <span style="border-top:1px dotted black">
                    Depositor Signature
                </span>
                <br>
                Mobile No 01746537821
            </div>
            <div class="col-md-4">
                <span style="">
                    Bank 
                    Seal
                </span>
            </div>
            <div class="col-md-4">
                <span style="border-top:1px dotted black">
                        Bank Officer Signature
                    </span>
            </div>
        </div>
</div>
<div class="container" style="width: 800px;height:100vh">
    <div>
        <span style="float: right">
            School Copy
        </span>
    </div>
    <br>
    <br>

    <div class="row">
        <div class="col-md-6">
            <span>
                Receipt No: {{implode('',explode('-',$student->dob)).$student->id}}{{date('my')}}
            </span>
            <br>
            Student Name {{$student->first_name." ".$student->last_name}}
            <br>
            Class {{$student->class}}
            <br>
            Section {{$student->class_section}}
        </div>
        <div class="col-md-6">
            <span  style="float: right">
                Date: {{date('d-m-y')}}
                <br>
                Gender {{$student->gender}}
                <br>
                Student ID {{implode('',explode('-',$student->dob)).$student->id}}
                <br>
                Session {{$student->session}}
                <br>
            </span>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SI No</th>
                <th>Particular</th>
                <th>Amount(TK)</th>
            </tr>
        </thead>
        <tbody>
            @php($i=1)
            @foreach($fees as $fee)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$fee->name}}</td>
                    <td style="text-align: right">{{$fee->price}}</td>
                </tr>
                @php($i++)
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th style="text-align: right" colspan="2">Total</th>
                <th style="text-align: right">{{$fees->sum('price')}}</th>
            </tr>
            <tr>
                <th colspan="3" style="text-align: center">
                   {{$total}} 
                </th>
            </tr>
        </tfoot>
    </table>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            <span style="border-top:1px dotted black">
                Depositor Signature
            </span>
            <br>
            Mobile No 01746537821
        </div>
        <div class="col-md-4">
            <span style="">
                Bank 
                Seal
            </span>
        </div>
        <div class="col-md-4">
            <span style="border-top:1px dotted black">
                    Bank Officer Signature
                </span>
        </div>
    </div>
</div>
</body>
</html>