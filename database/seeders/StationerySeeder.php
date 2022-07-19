<?php

namespace Database\Seeders;

use App\Models\Stationery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stationery::truncate();
        $stationeries = [
            "Pen_Faber-Castell CX 0.5mm",
            "Pen_FABER Grip 0.5mm",
            "Pen_ZEBRA.120 (Permanent)",
            "Pencil",
            "Hight Light _SL60G-G",
            "Correction Pen_ZL72-W",
            "Correction Pen_XZTT15P-WE",
            "Pencil shapener",
            "Ruler",
            "Glue",
            "Cutter_SQ 8804",
            "Scissors_SQ 8826",
            "Calculator_DT730",
            "Eraser",
            "Stick Note_SQ6675",
            "Stick Note_SQ6674",
            "Stick Note_SQ6654",
            "Paper Clip",
            "Paper Puncher_DP-15T/B",
            "Staple Remover_NO.1163",
            "Stapler_HD-10N",
            "Staples_10- 1M",
            "Scotch Tape_22056 (Small)",
            "Scotch Tape_60CM (Big)",
            "Scotch Tape_Side 12 (Twin)",
            "Scotch Tape_3M",
            "Marker Board_Black",
            "Marker Board_Red",
            "Marker Board_Blue",
            "Thumb Print Pad ( SM-2 )",
            "White Board Eraser",
            "Key Tag_SQ3318",
            "Stamp Pad_SP3",
            "Stamp Pad_two color",
            "Self inking Dater_S400",
            "Mini Dater_S300",
            "Stamp ink_S63",
            "WhiteBord refill",
            "Eminent refill ink",
            "Finger tip",
            "Binder Clip_SQ 0260",
            "Binder Clip_SQ 0200",
            "Binder Clip_SQ 0155",
            "Binder Clip_SQ 0111",
            "Binder Clip_SQ 0107",
            "Binder Clip_SQ 0105",
            "Envelope 555_Big 21052",
            "Envelope 555_Small 21091",
            "Yellow File_A4",
            "Yellow File_F4",
            "Brown Everlop_A4",
            "Brown Everlop_F4",
            "Clear Folder_E310",
            "Clip Board_A724",
            "Folder_C335",
            "Comix File_A858",
            "Comix File_EH303A",
            "File MagaZine_B2171",
            "File Clear Book_NF 60AK",
            "File_A205",
            "File_A206",
            "File _A207",
            "File_TC533 U/D",
            "File_AR151 A/P",
            "File_AR151 A/W",
            "File Folding Tray_US5033",
            "Desk organizer_USK158",
            "A4 Paper",
            "Rubbish bin",
            "Rubber",
            "Battery_9V",
            "Battery_AAA",
            "Battery_AA",
            "Bookends",
            "Super Sticky 41721P890 (76x127mm)",
            "Lipuid Gel Ink 0.5mm Black ",
            "Lipuid Gel Ink 0.5mm Red",
            "Lipuid Gel Ink 0.5mm Blue",
            "Power Socket ",
            "Mouse Signo Wireless WM-106BL",
            "Sign Here",
        ];
        foreach($stationeries as $key => $stationery){
            $newStationery = new Stationery();
            $newStationery->code = $stationery;
            $newStationery->quantity = "Pcs";
            $newStationery->save();
        }
    }
}


