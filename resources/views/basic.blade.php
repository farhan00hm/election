@extends('main-template')
@section('individual-link')
    <!-- TODO download to custom assets file -->

    <!--CSS for your project-->
    <link href="https://wtabs.softwaretailoring.net/assets/dist/css/wheelizate.tab.min.css" rel="stylesheet">
    {{--    <link href="https://wtabs.softwaretailoring.net/themes/themeBasic/Gray/theme.min.css" rel="stylesheet">--}}

    <!--JS for your project-->
    <script src="https://wtabs.softwaretailoring.net/assets/required/js/jquery-1.11.3.min.js"></script>
    <script src="https://wtabs.softwaretailoring.net/assets/required/js/raphael.min.js"></script>
    <script src="https://wtabs.softwaretailoring.net/assets/required/js/raphael.icons.min.js"></script>
    <script src="https://wtabs.softwaretailoring.net/assets/required/js/wheelnav.min.js"></script>
    <script src="https://wtabs.softwaretailoring.net/assets/dist/js/wheelizate.tab.min.js"></script>
@endsection
@section('body')
    <div class="row">
        <div class="col-md-4">
            <img src="https://franchisematch.com/wp-content/uploads/2015/02/john-doe.jpg" class="rounded-circle"
                 alt="Cinque Terre">
        </div>
        <div class="col-md-8">
            <div class="row" style="margin: 30px;">
                <div class="col-md-4">
                    <span class="border" style="margin: 5px; padding: 10px;">{{ $candidate->নাম }}</span>
                </div>
                <div class="col-md-4">
                    <span class="border" style="margin: 5px; padding: 10px;">আসনঃ {{ $candidate->আসন }}</span>
                </div>
            </div>

            <div class="row" style="margin: 30px;">
                <div class="col-md-4">
                    <span class="border"
                          style="margin: 5px; padding: 10px;">শিক্ষাগত যোগ্যতাঃ {{ $candidate->শিক্ষাগত_যোগ্যতা }}</span>
                </div>
                <div class="col-md-4">
                    <span class="border" style="margin: 5px; padding: 10px;">কতাবার নির্বাচিতঃ ১</span>
                </div>
            </div>

            <div class="row" style="margin: 30px;">
                <div class="col-md-4">
                    <span class="border" style="margin: 5px; padding: 10px;">পেশাঃ {{ $candidate->পেশা }}</span>
                </div>

            </div>
        </div>
    </div>
    <div id="wheel-data">
        <div id="tab"
             data-wtab
             data-wtab-selectedtab="1"
             data-wtab-tabtype="Apart"
             data-wtab-tabsubtype="Left"
             data-wtab-tabthemetype="Basic"
             data-wtab-tabwheeltype="Pie"
             data-wtab-wheelradius="110"
             data-wtab-titlerotateangle="0"
             data-wtab-iconheight="40"
             data-wtab-iconwidth="40"
             data-wtab-clockwise
             data-wtab-marker
             data-wtab-wheelanimation="bounce"
             data-wtab-paneanimation="bounce"
             data-wtab-tabrounded
             data-wtab-tabshadowed
             data-wtab-minheight="300"
             data-wtab-sliderseconds="0"
             data-wtab-keyenabled>
            <div class="test">
                <!-- মামলা tab -->
                <div data-wtab-tabtitle-text="মামলা" data-wtab-tabtitle-tooltip="মামলা">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">মামলায় অভিযুক্ত কি না?</th>
                            <th scope="col">মামলার ধারা</th>
                            <th scope="col">আদালতের নাম</th>
                            <th scope="col">মামলা নম্বর</th>
                            <th scope="col">মামলার অবস্থা</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">{{ $candidate->মামলায়_অভিযুক্ত_কি_না }}</th>
                            <td>{{ $candidate->মামলার_ধারা }}</td>
                            <td>{{ $candidate->আদালতের_নাম }}</td>
                            <td>{{ $candidate->মামলা_নম্বর }}</td>
                            <td>{{ $candidate->মামলার_অবস্থা }}</td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- income div -->
                <div data-wtab-tabtitle-text="আয়" data-wtab-tabtitle-tooltip="Tooltip 2">
                    <p>
                        <button class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1"
                                role="button" aria-expanded="false" aria-controls="multiCollapseExample1">নিজ
                        </button>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#multiCollapseExample2" aria-expanded="false"
                                aria-controls="multiCollapseExample2">নির্ভরশীল
                        </button>

                    </p>
                    <div id="graph-collapse">
                        <div class="row">
                            <div class="col">
                                <div class="collapse show" id="multiCollapseExample1" data-bs-parent="#graph-collapse">

                                    <div class="" style="margin-top:20px; margin-left: 20px; height: 300px;">
                                        <canvas class="graph-div" id="ownIncomeGraphChart"></canvas>
                                    </div>
                                    {{--                            <div class="card card-body">--}}
                                    {{--                                Some placeholder content for the first collapse component of this multi-collapse example. This panel is hidden by default but revealed when the user activates the relevant trigger.--}}
                                    {{--                            </div>--}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="collapse" data-bs-parent="#graph-collapse" id="multiCollapseExample2">
                                    <div class="card card-body">
                                        <div class="" style="margin-top:20px; margin-left: 20px; height: 300px;">
                                            <canvas class="graph-div" id="dependentIncomeGraphChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- loan tab -->
                <div data-wtab-tabtitle-text="ঋণ" data-wtab-tabtitle-tooltip="Tooltip 3">
                    <div class="card card-body">
                        <div class="" style="margin-top:20px; margin-left: 20px; height: 300px;">
                            <div class="table-wrapper">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ব্যাংক/ প্রতিষ্ঠানের নাম</th>
                                        <th scope="col">ঋণের পরিমাণ</th>
                                        <th scope="col">খেলাপী ঋণের পরিমাণ</th>
                                        <th scope="col">পূনঃতফসীলের সর্বশেষ তারিখ</th>
                                        <th scope="col">খাত</th>
                                        <th scope="col">সাল</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($loanDatas as $loanData)
                                        <tr>
                                            <th scope="row">{{ $loanData['ব্যাংক_প্রতিষ্ঠানের_নাম'] }}</th>
                                            <td>{{ $loanData['ঋণের_পরিমাণ'] }}</td>
                                            <td>{{ $loanData['খেলাপী_ঋণের_পরিমাণ'] ?? '' }}</td>
                                            <td>{{ $loanData['পূনঃতফসীল_সর্বশেষ_তারিখ'] }}</td>
                                            <td>{{ $loanData['খাত'] }}</td>
                                            <td>{{ $loanData['সাল'] }}</td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- সম্পদ tab -->
                <div data-wtab-tabtitle-text="সম্পদ" data-wtab-tabtitle-tooltip="Tooltip 4">
                    <div id="graph-collapse2">
                        <div class="row">
                            <div class="col">
                                <div class="collapse show" id="movableTable" data-bs-parent="#graph-collapse2">
                                    <div class="card card-body">
                                        <div class="" style="margin-top:20px; margin-left: 20px; height: 300px;">
                                            <div class="table-wrapper">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">নিজ</th>
                                                        <th scope="col">স্ত্রী/স্বামী</th>
                                                        <th scope="col">নির্ভরশীল</th>
                                                        <th scope="col">খাত</th>
                                                        <th scope="col">সাল</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($movableDatas as $movableData)
                                                        <tr>
                                                            <th scope="row">{{ $movableData->নিজ }}</th>
                                                            <td>{{ $movableData->স্ত্রী_স্বামী }}</td>
                                                            <td>{{ $movableData->নির্ভরশীল }}</td>
                                                            <td>{{ $movableData->খাত }}</td>
                                                            <td>{{ $movableData->সাল }}</td>
                                                        </tr>
                                                    @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="collapse" data-bs-parent="#graph-collapse2" id="immovableTable">
                                    <div class="card card-body">
                                        <div class="" style="margin-top:20px; margin-left: 20px; height: 300px;">
                                            <div class="table-wrapper">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">নিজ</th>
                                                        <th scope="col">স্ত্রী/স্বামী</th>
                                                        <th scope="col">নির্ভরশীল</th>
                                                        <th scope="col">খাত</th>
                                                        <th scope="col">সাল</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($immovableDatas as $immovableData)
                                                        <tr>
                                                            <th scope="row">{{ $immovableData->নিজ }}</th>
                                                            <td>{{ $immovableData->স্ত্রী_স্বামী }}</td>
                                                            <td>{{ $immovableData->নির্ভরশীল }}</td>
                                                            <td>{{ $immovableData->যৌথ_মালিকানা }}</td>
                                                            <td>{{ $immovableData->প্রার্থীর_অংশ }}</td>
                                                            <td>{{ $immovableData->খাত }}</td>
                                                            <td>{{ $immovableData->সাল }}</td>
                                                        </tr>
                                                    @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>
                        <button class="btn btn-primary" data-bs-toggle="collapse" href="#movableTable"
                                role="button" aria-expanded="false" aria-controls="movableTable">স্থাবর
                        </button>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#immovableTable" aria-expanded="false"
                                aria-controls="immovableTable">অস্থাবর
                        </button>

                    </p>
                </div>


                <div data-wtab-tabtitle-text="প্রতিশ্রুতি" data-wtab-tabtitle-tooltip="Tooltip 4">প্রতিশ্রুতি</div>
            </div>
        </div>
    </div>

@endsection
@section('individual-js')
    <script>
        window.onload = function () {
            $('#tab').wheelizateTabHtml();
            // - OR without jQuery - //
            // wheelizateTabHtml("tab");
        }


        let colorArray = [
            "#4b77a9",
            "#5f255f",
            "#d21243",
            "#B27200",
            'Magenta',
            "#008B00",
            "#050505",
            "#42426F",
            "#4B0082",
            "#B0171F",
            "#660000",
        ]
        let myChart;

        let graphValuesOfOwnIncome = {!! json_encode($graphValuesOfOwnIncome) !!};
        let graphValuesOfDependentIncomeIncome = {!! json_encode($graphValuesOfDependentIncomeIncome) !!};

        console.log(graphValuesOfOwnIncome);
        $(document).ready(function () {
            formGraph("ownIncomeGraphChart", graphValuesOfOwnIncome);
            formGraph("dependentIncomeGraphChart", graphValuesOfDependentIncomeIncome);

        });


        //forming graph
        function formGraph(graphId, graphValues) {
            let exportData = graphValues;
            let exportDataLabel = []
            const labels = graphValues['xAxis'];

            const data = {
                labels: labels,
                datasets: []
            };

            console.log("yAxis value")
            console.log(graphValues['yAxis'][0]['label'])

            for (let i = 0; i < graphValues['yAxis'].length; i++) {

                data.datasets.push(
                    {
                        label: graphValues['yAxis'][i]['label'],
                        data: graphValues['yAxis'][i]['value'],
                        borderWidth: 2,
                        borderColor: colorArray[i],
                        backgroundColor: colorArray[i],
                        fill: false

                    },
                )


            }
            const config = {
                type: 'bar',
                data: data,
                options: {
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },

                }
            };

            myChart = new Chart(
                document.getElementById(graphId),
                config
            );
        }
    </script>
@endsection
