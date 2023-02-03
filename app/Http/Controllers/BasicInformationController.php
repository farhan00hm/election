<?php

namespace App\Http\Controllers;

use App\Models\BasicInformation;
use App\Models\Immovable;
use App\Models\income;
use App\Models\Liability;
use App\Models\Loan;
use App\Models\Movable;
use App\Models\Promise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasicInformationController extends Controller
{
    public function basicInformation(Request $request){
        $id = $request->id;
        $graphValuesOfOwnIncome=[];
        $graphValuesOfDependentIncomeIncome=[];
        $xAxisValues = [];
        $yAxisValuesOfIncome = [];
        $yAxisValuesOfDependent = [];
        $candidate = BasicInformation::find($id);
        $candidateName = $candidate->নাম;
        $incomes = Income::where('প্রার্থী','=',$candidateName)->get();
        foreach ($incomes as $income){
            array_push($xAxisValues,$income->খাত);
        }
        $allYears = income::select('সাল')->pluck('সাল')->toArray();
        $uniqueYears = array_values(array_unique($allYears));
        foreach ($uniqueYears as $year){

            //collect the values of own income for individual candidate
            $values = income::where([
                ['প্রার্থী','=',$candidateName],
                ['সাল', '=', $year]
            ])->pluck('নিজ');
            $yAxisValueOfIncome['label'] = $year;
            $yAxisValueOfIncome['value'] = $values;
            $yAxisValuesOfIncome[] = $yAxisValueOfIncome;

            //collect the values of own income for individual candidate
            $values = income::where([
                ['প্রার্থী','=',$candidateName],
                ['সাল', '=', $year]
            ])->pluck('নির্ভরশীল');
            $yAxisValueOfDependent['label'] = $year;
            $yAxisValueOfDependent['value'] = $values;
            $yAxisValuesOfDependent[] = $yAxisValueOfDependent;


        }
        $graphValuesOfOwnIncome['xAxis']  = $xAxisValues;
        $graphValuesOfOwnIncome['yAxis'] = $yAxisValuesOfIncome;

        $graphValuesOfDependentIncomeIncome['xAxis'] = $xAxisValues;
        $graphValuesOfDependentIncomeIncome['yAxis'] = $yAxisValuesOfDependent;

        //movable table data
        $movableDatas = Movable::where('প্রার্থী','=',$candidateName)->get();
        $movableDatas = $movableDatas->sortBy('সাল')->sortBy('খাত');

        //immovable table data
        $immovableDatas = Immovable::where('প্রার্থী','=',$candidateName)->get();
        $immovableDatas = $immovableDatas->sortBy('সাল')->sortBy('খাত');

        //loan table data start
        $rawLoanDatas = Loan::where('প্রার্থী','=',$candidateName)->get();
        $loanDatas= [];
        foreach ($rawLoanDatas as $rawLoanData){
            if($rawLoanData->ব্যাংক_প্রতিষ্ঠানের_নাম != null){
                $banks = explode("।",$rawLoanData->ব্যাংক_প্রতিষ্ঠানের_নাম);
                $loansAmount = explode("।",$rawLoanData->ঋণের_পরিমাণ);
                $tafsilDates = explode("।",$rawLoanData->পূনঃতফসীল_সর্বশেষ_তারিখ);
                for($i=0;$i< sizeof($banks);$i++){
                    //TODO need add other properties like খেলাপি ঋণের পরিমাণ need to discuss about id 25 of tafsil date
//                    সিলেট-৩	মাহমুদ উস সামাদ চৌধুরী	সোনালী ব্য়াংক লিঃ। ইউসিবিএল, প্রিন্সিপাল শাখা। স্ট্যান্ডার্ড ব্যাংক লিঃ,  প্রিন্সিপাল শাখা। ইউসিবিএল, প্রিন্সিপাল শাখা। এক্সিম ব্যাংক লিঃ, ফেঞ্চুগঞ্জ শাখা	442540000। 204681000। 14258306.6। 4739000। 28283000		০২/১০/২০১৮। 	এমডি, চেয়ারম্যান বা ডিরেক্টর	2018
                    $loan = [];
                    $loan['ব্যাংক_প্রতিষ্ঠানের_নাম'] = array_key_exists($i,$banks)  ? $banks[$i] : "";
                    $loan['ঋণের_পরিমাণ'] = array_key_exists($i,$loansAmount) ? $loansAmount[$i] : "";
                    $loan['পূনঃতফসীল_সর্বশেষ_তারিখ'] = array_key_exists($i,$tafsilDates)  ? $tafsilDates[$i] : "";
                    $loan['খাত'] = $rawLoanData->খাত;
                    $loan['সাল'] = $rawLoanData->সাল;
                    array_push($loanDatas,$loan);
                }

            }

        }
        //loan table data end

        //দায় ট্যাবল data start
        $rawLiabilitiesDatas = Liability::where('প্রার্থী','=',$candidateName)->get();
        $liabilitiesDatas = [];
        foreach ($rawLiabilitiesDatas as $rawLiabilitiesData){
            if($rawLiabilitiesData ->দায়সমূহের_প্রকৃতি_বর্ণণা != null){
                //দায়সমূহের প্রকৃতি ও বর্ণণা
                $liabilitiesTypeAndDescriptions = explode("।",$rawLiabilitiesData->দায়সমূহের_প্রকৃতি_বর্ণণা);

                //পরিমাণ
                $liabilitiesAmounts = explode("।",$rawLiabilitiesData->পরিমাণ);
                for($i=0; $i< sizeof($liabilitiesTypeAndDescriptions); $i++){
                    $liability = [];
                    $liability['দায়সমূহের_প্রকৃতি_বর্ণণা'] = array_key_exists($i,$liabilitiesTypeAndDescriptions)  ? $liabilitiesTypeAndDescriptions[$i] : "";
                    $liability['পরিমাণ'] = array_key_exists($i,$liabilitiesAmounts)  ? $liabilitiesAmounts[$i] : "";
                    $liability['সাল'] = $rawLiabilitiesData->সাল;
                    array_push($liabilitiesDatas,$liability);
                }
            }
        }
        //দায় ট্যাবল data end

        //Promise data start
        $rawPromises = Promise::where('প্রার্থী','=',$candidateName)->get();
        $promiseDatas=[];
        foreach ($rawPromises as $rawPromise){
            if($rawPromise->প্রতিশ্রুতি !=null){
                $promises = explode("।",$rawPromise->প্রতিশ্রুতি);
                $achievements = explode("।",$rawPromise->অর্জন);
                for($i=0;$i<sizeof($promises);$i++){
                    $promise=[];
                    $promise['প্রতিশ্রুতি'] =  array_key_exists($i,$promises)  ? $promises[$i] : "";
                    $promise['অর্জন'] =  array_key_exists($i,$achievements)  ? $achievements[$i] : "";
                    $promise['সাল'] = $rawPromise->সাল;
                    array_push($promiseDatas,$promise);
                }
            }
        }


        //Promise data end

//        dd($loanDatas);
        return view( 'basic',["candidate"=>$candidate,"graphValuesOfOwnIncome"=>$graphValuesOfOwnIncome,"graphValuesOfDependentIncomeIncome"=>$graphValuesOfDependentIncomeIncome,"movableDatas"=>$movableDatas,"immovableDatas"=>$immovableDatas,"loanDatas"=>$loanDatas,"liabilitiesDatas"=>$liabilitiesDatas,"promiseDatas"=>$promiseDatas]);
    }

}
