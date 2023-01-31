<?php

namespace App\Http\Controllers;

use App\Models\BasicInformation;
use App\Models\Immovable;
use App\Models\income;
use App\Models\Movable;
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

//        $allYears =  DB::table('incomes')->pluck('সাল')->toArray();
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
        $immovableDatas = Immovable::where('প্রার্থী','=',$candidateName)->get();
        return view( 'basic',["candidate"=>$candidate,"graphValuesOfOwnIncome"=>$graphValuesOfOwnIncome,"graphValuesOfDependentIncomeIncome"=>$graphValuesOfDependentIncomeIncome,"movableDatas"=>$movableDatas,"immovableDatas"=>$immovableDatas]);
    }
}
