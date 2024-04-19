<?php

use App\Models\MaxRfq;

class RfqHelper
{
    public static function getStatusString($status)
    {
        $array_status_string = array(
            MaxRfq::BARU => 'BARU',
            MaxRfq::PEKERJAAN => 'PERSIAPAN PENGADAAN',
            MaxRfq::PENGADAAN => 'PENGADAAN',
            MaxRfq::REVISI => 'REVISI',
            MaxRfq::REV_APP => 'REVISI DISETUJUI',
            MaxRfq::REV_REJ => 'REVISI DITOLAK',
            MaxRfq::CLOSE => 'CLOSE',
        );
        return $array_status_string[$status];
    }

    public static function mapApi($obj = 'sap_pr')
    {
        //pr dari tabel
        $arr['MaxPr_detail']['pr_no']     = 'NO PR';
        $arr['MaxPr_detail']['pr_line'] = 'PR Line';
        $arr['MaxPr_detail']['pr_desc'] = 'Deskripsi';
        $arr['MaxPr_detail']['req_date'] = 'Req Date';
        $arr['MaxPr_detail']['pr_type'] = 'Tipe PR';
        $arr['MaxPr_detail']['pr_qty']     = 'QTY';
        $arr['MaxPr_detail']['pr_unit'] = 'Unit';
        $arr['MaxPr_detail']['pr_cost'] = 'Cost';

        // pr sap
        $arr['sap_pr']["MANDT"]          = 'Client';
        $arr['sap_pr']["PAKET_NO"]    = 'No Paket';
        $arr['sap_pr']["PAKET_ITEM"]  = 'No Item';
        $arr['sap_pr']["VERSION"]     = 'Version';
        $arr['sap_pr']["BANFN"]       = 'PR Number';
        $arr['sap_pr']["BNFPO"]       = 'PR Item Number';
        $arr['sap_pr']["BUKRS"]       = 'Company Code';
        $arr['sap_pr']["WERKS"]       = 'Plant';
        $arr['sap_pr']["EKORG"]       = 'Purchase Organisation';
        $arr['sap_pr']["EKGRP"]       = 'Purchase Group';
        $arr['sap_pr']["KNTTP"]       = 'Account Assignment Category';
        $arr['sap_pr']["PSTYP"]       = 'Item category in purchasing document';
        $arr['sap_pr']["EPSTP"]       = 'Item category in purchasing document';
        $arr['sap_pr']["MATNR"]  = 'Material Number';
        $arr['sap_pr']["TXZ01"]  = 'Short Text';
        $arr['sap_pr']["MENGE"]  = 'Quantity';
        $arr['sap_pr']["MEINS"]  = 'Base Unit of Measure';
        $arr['sap_pr']["PREIS"]  = 'Price';
        $arr['sap_pr']["PEINH"]  = 'Price unit';
        $arr['sap_pr']["WAERS"]  = 'Currency Key';
        $arr['sap_pr']["ERNAM"]  = 'Name of Person Who Created the Object';
        $arr['sap_pr']["LFDAT"]  = 'Delivery date';
        $arr['sap_pr']["SAKTO"]  = 'Cost element';
        $arr['sap_pr']["KOSTL"]  = 'Cost Center';
        $arr['sap_pr']["AUFNR"]  = 'Order Number';
        $arr['sap_pr']["PS_PSP_PNR"]    = 'WBS';
        $arr['sap_pr']["EXTROW"]   = 'Service Line Number';
        $arr['sap_pr']["SRVPOS"]    = 'Service number';
        $arr['sap_pr']["KTEXT1"]   = 'Service Short Text 1';
        $arr['sap_pr']["MENGES"]    = 'Service Quantity';
        $arr['sap_pr']["MEINSS"]   = 'Service Base Unit of Measure';
        $arr['sap_pr']["MSG"]      = 'Process Messages';
        $arr['sap_pr']["LIGHT"]    = 'Status';
        $arr['sap_pr']["LOEKZ"]    = 'Deletion Flag';
        $arr['sap_pr']["DLUNAME"]  = 'Delete By';
        $arr['sap_pr']["DLDATE"]   = 'Delete Date';
        $arr['sap_pr']["DLTIME"]   = 'Delete Time';
        $arr['sap_pr']["FILENAME"] = 'File Name';
        $arr['sap_pr']["CREATED_BY"]   = 'User Name';
        $arr['sap_pr']["CREATED_DATE"] = 'Created Date';
        $arr['sap_pr']["CREATED_TIME"] = 'Created Time';
        $arr['sap_pr']["RINCID"]       = 'ID EPROC';
        $arr['sap_pr']["FREIGHT_COST"] = 'FREIGHT COST';
        $arr['sap_pr']["EXP_PRICE"] = 'EXP PRICE';

        //purchase grup
        $arr['ekgrp']['101']    = 'Parts A & Impor';
        $arr['ekgrp']['102']    = 'Steel';
        $arr['ekgrp']['103']    = 'Komponen Mekanik';
        $arr['ekgrp']['104']    = 'Komponen Elektrik';
        $arr['ekgrp']['105']    = 'Consumble & Tools';
        $arr['ekgrp']['106']    = 'Jasa Proses Mnfktr';
        $arr['ekgrp']['107']    = 'Jasa Pndkng Prod';
        $arr['ekgrp']['108']    = 'Barang Umum';
        $arr['ekgrp']['109']    = 'Jasa Umum';
        $arr['ekgrp']['110']    = 'Inhouse Poduction';

        //storage location
        $arr['lgrot']['0001'] =    'Ekspedisi';
        $arr['lgrot']['0002'] =    'Gudang Utama';
        $arr['lgrot']['0004'] =    'Car Storage';
        $arr['lgrot']['0005'] =    'Temporary Area';
        $arr['lgrot']['0006'] =    'Tool Fabrikasi';
        $arr['lgrot']['0007'] =    'Tool Finishing';
        $arr['lgrot']['0009'] =    'Repair';
        $arr['lgrot']['002A'] =    'OPEN STORAGE';
        $arr['lgrot']['002B'] =    'OPEN EXTERNAL 1';
        $arr['lgrot']['002C'] =    'OPEN EXTERNAL 2';
        $arr['lgrot']['002D'] =    'OPEN EXTERNAL 3';
        $arr['lgrot']['003A'] =    'Machining 1';
        $arr['lgrot']['003B'] =    'PPL1(SW1)';
        $arr['lgrot']['003C'] =    'PPL2(WELD1)';
        $arr['lgrot']['003D'] =    'PRKB(WELD 2,3,4)';
        $arr['lgrot']['003E'] =    'PRKT(WELD 5,6)';
        $arr['lgrot']['003F'] =    'Paintng(C123456)';
        $arr['lgrot']['003G'] =    'PMK Listrik';
        $arr['lgrot']['003H'] =    'Perakitan Bogie';
        $arr['lgrot']['003I'] =    'Inspection Pit';
        $arr['lgrot']['003J'] =    'Piping';
        $arr['lgrot']['003K'] =    'Interior';
        $arr['lgrot']['003L'] =    'MO';
        $arr['lgrot']['003M'] =    'Machining 2';
        $arr['lgrot']['003N'] =    'PMK Mekanik';
        $arr['lgrot']['003O'] =    'Fiber';
        $arr['lgrot']['003P'] =    'WORKSHOP AC';
        $arr['lgrot']['003Q'] =    'DESAIN';
        $arr['lgrot']['003R'] =    'PPC';
        $arr['lgrot']['003S'] =    'PCC BARAT';
        $arr['lgrot']['003T'] =    'PCC TIMUR';
        $arr['lgrot']['004A'] =    'GD After Sales';
        $arr['lgrot']['004H'] =    'GD Pemeliharaan';
        $arr['lgrot']['1000'] =    'Subcontractor';
        $arr['lgrot']['SHAR'] =    'Pemeliharaan';
        $arr['lgrot']['UMUM'] =    'General Affairs';

        //payment term
        $arr['dzterm']['ZI01'] = 'L/C at Sight';
        $arr['dzterm']['ZI02'] = 'TT After 30 Days';
        $arr['dzterm']['ZI03'] = 'TT Advance';
        $arr['dzterm']['ZI04'] = 'DP 20% - 80% by L/C';
        $arr['dzterm']['ZI05'] = 'DP 15% - 85% by L/C';
        $arr['dzterm']['ZI06'] = 'Usance L/C';
        $arr['dzterm']['ZL01'] = 'TT 30 hari';
        $arr['dzterm']['ZL02'] = 'SKBDN at Sight';
        $arr['dzterm']['ZL03'] = 'DP 20% - Sisanya Bertahap';
        $arr['dzterm']['ZL04'] = 'DP 20% - 80%';
        $arr['dzterm']['ZL05'] = 'Cash';
        $arr['dzterm']['ZL06'] = 'Back to Back';
        $arr['dzterm']['ZL07'] = 'Usance SKBDN';
        $arr['dzterm']['ZL08'] = 'TT 60 hari';
        $arr['dzterm']['ZL09'] = 'TT 180 hari';
        $arr['dzterm']['ZL10'] = 'Pembayaran 180 hari';
        $arr['dzterm']['ZL11'] = 'SCF 30 Hari';

        $arr['bsart']['DB'] =    'Letter of Intent';
        $arr['bsart']['EUB'] =    'DFPS, Int. Ord. Type';
        $arr['bsart']['FO'] =    'Framework Order';
        $arr['bsart']['NB'] =    'Standard PO';
        $arr['bsart']['UB'] =    'Stock Transp. Order';
        $arr['bsart']['ZBOK'] =    'Booked Po Number';
        $arr['bsart']['ZIM'] =    'Import PO';
        $arr['bsart']['ZPC'] =    'PO Conversion';
        $arr['bsart']['ZPL'] =    'Pembelian Langsung';
        $arr['bsart']['ZSER'] =    'PO Service';
        $arr['bsart']['ZSKB'] =    'LC Skbdn PO';
        $arr['bsart']['ZLOI'] =    'LOI';
        $arr['bsart']['MK'] =    'Kontrak Tahunan';


        //rfq export
        $arr['rfq_header']['EBELN'] = 'RFQ Number';
        $arr['rfq_header']['BEDAT'] = 'RFQ Date';
        $arr['rfq_header']['KDATB'] = 'Validity Start';
        $arr['rfq_header']['KDATE'] = 'Validity End';
        $arr['rfq_header']['ANGDT'] = 'Deadline Quotation';
        $arr['rfq_header']['ZTERM'] = 'Payment Term';
        $arr['rfq_header']['INCO1'] = 'Incoterm Code';
        $arr['rfq_header']['INCO2'] = 'Incoterm Additional Information';
        $arr['rfq_header']['LIFNR'] = 'ID Vendor';
        $arr['rfq_header']['VERKF'] = 'Sales Person';
        $arr['rfq_header']['TELF1'] = 'Sales Person Telephone';
        $arr['rfq_header']['EKORG'] = 'Purchasing Organization';
        $arr['rfq_header']['EKGRP'] = 'Purchasing Group';
        $arr['rfq_header']['BUKRS'] = 'Company Code';
        $arr['rfq_header']['SUBMI'] = 'Collective Number';
        $arr['rfq_header']['IHREZ'] = 'Reference 1';
        $arr['rfq_header']['UNSEZ'] = 'Reference 2';
        $arr['rfq_header']['KNTTP'] = 'Acc Assignment';

        $arr['rfq_item']['EBELN'] = 'RFQ Number';
        $arr['rfq_item']['EBELP'] = 'Item Number of RFQ';
        $arr['rfq_item']['LOEKZ'] = 'Deletion Indicator RFQ item';
        $arr['rfq_item']['PSTYP'] = 'Item Category in RFQ';
        $arr['rfq_item']['MATNR'] = 'Material Number';
        $arr['rfq_item']['TXZ01'] = 'Material Short Text';
        $arr['rfq_item']['BUKRS'] = 'Company Code';
        $arr['rfq_item']['WERKS'] = 'Plant';
        $arr['rfq_item']['LGORT'] = 'Storage Location';
        $arr['rfq_item']['MATKL'] = 'Material Group';
        $arr['rfq_item']['MENGE'] = 'RFQ Quantity';
        $arr['rfq_item']['MEINS'] = 'RFQ Unit of Measure';
        $arr['rfq_item']['MTART'] = 'Material Type';
        $arr['rfq_item']['EINDT'] = 'Item Delivery Date';
        $arr['rfq_item']['BANFN'] = 'PR Number';
        $arr['rfq_item']['BNFPO'] = 'Item PR Number';
        $arr['rfq_item']['POSID'] = 'Work Breakdown System Number';

        $arr['rfq_service']['EBELN']    = 'RFQ Number';
        $arr['rfq_service']['EBELP']    = 'Item Number of RFQ';
        $arr['rfq_service']['EXTROW']    = 'Line Number Service';
        $arr['rfq_service']['DEL']        = 'Deletion Indicator';
        $arr['rfq_service']['MENGE']    = 'RFQ Quantity';
        $arr['rfq_service']['MEINS']    = 'RFQ Unit of Measure';
        $arr['rfq_service']['KTEXT1']    = 'Short Text';
        $arr['rfq_service']['POSID']    = 'Work Breakdown System Number';



        //loi export


        $arr['loi_header']['EBELN'] =     'LOI Number';
        $arr['loi_header']['BSART'] =     'Doc Type';
        $arr['loi_header']['AEDAT'] =     'LOI Create Date';
        $arr['loi_header']['WAERS'] =     'Currency';
        $arr['loi_header']['WKURS'] =     'Kurs';
        $arr['loi_header']['ZTERM'] =     'Payment Term';
        $arr['loi_header']['ZBD1T'] =     'Payment in';
        $arr['loi_header']['BEDAT'] =     'LOI Doc Date';
        $arr['loi_header']['KDATB'] =     'Validity Period Start';
        $arr['loi_header']['KDATE'] =     'Validity Period End';
        $arr['loi_header']['INCO1'] =     'Incoterm Code';
        $arr['loi_header']['INCO2'] =     'Incoterm Additional Information';
        $arr['loi_header']['LIFNR'] =     'ID Vendor';
        $arr['loi_header']['VERKF'] =     'Sales Person';
        $arr['loi_header']['TELF1'] =     'Sales Person Telephone';
        $arr['loi_header']['EKORG'] =     'Purchasing Organization';
        $arr['loi_header']['EKGRP'] =     'Purchasing Group';
        $arr['loi_header']['BUKRS'] =     'Company Code';
        $arr['loi_header']['IHREZ'] =     'Reference 1';
        $arr['loi_header']['UNSEZ'] =     'Reference 2';

        $arr['loi_item']['EBELN'] = 'LOI Number';
        $arr['loi_item']['EBELP'] = 'Item Number of LOI';
        $arr['loi_item']['AEDAT'] = 'Purchasing Document Item Change Date';
        $arr['loi_item']['TXZ01'] = 'Short Text';
        $arr['loi_item']['MATNR'] = 'Material Number';
        $arr['loi_item']['BUKRS'] = 'Company Code';
        $arr['loi_item']['WERKS'] = 'Plant';
        $arr['loi_item']['LGORT'] = 'Storage Location';
        $arr['loi_item']['MATKL'] = 'Material Group';
        $arr['loi_item']['MENGE'] = 'Quantity';
        $arr['loi_item']['MEINS'] = 'Unit of Measure';
        $arr['loi_item']['NETPR'] = 'Net Price';
        $arr['loi_item']['BRTWR'] = 'Gross Price';
        $arr['loi_item']['MWSKZ'] = 'Tax Code';
        $arr['loi_item']['PSTYP'] = 'Item Category';
        $arr['loi_item']['KNTTP'] = 'Account Assignment';
        $arr['loi_item']['BANFN'] = 'PR Number';
        $arr['loi_item']['BNFPO'] = 'Item PR';


        $arr['loi_service']['EBELN']    = 'LOI Number';
        $arr['loi_service']['EBELP']    = 'Item Number of LOI';
        $arr['loi_service']['EXTROW']    = 'Line Number Service';
        $arr['loi_service']['DEL']        = 'Deletion Indicator';
        $arr['loi_service']['KTEXT1']    = 'Short Text';
        $arr['loi_service']['MENGE']    = 'Qty';
        $arr['loi_service']['MEINS']    = 'UOm';
        $arr['loi_service']['BRTWR']    = 'Gross Price';

        $arr['pr_type'][''] = '--Pilih Tipe--';
        $arr['pr_type'][0] = 'ITEM';
        $arr['pr_type'][9] = 'JASA';

        $arr['gr_movement'][103]   = '[103] Kedatangan Barang';
        $arr['gr_movement'][104]   = '[104] Reverse dokumen 103';
        $arr['gr_movement'][105]   = '[105] LPPB';
        $arr['gr_movement'][106]   = '[106] Reverse dokumen 105';
        $arr['gr_movement'][124]   = '[124] Ketidak sesuaian Barang NCR';

        $arr['inco']['CFR'] = 'Costs and freight';
        $arr['inco']['CIF'] = 'Costs, insurance & freight';
        $arr['inco']['CIP'] = 'Carriage and insurance paid to';
        $arr['inco']['CPT'] = 'Carriage paid to';
        $arr['inco']['DAF'] = 'Delivered at frontier';
        $arr['inco']['DDP'] = 'Delivered Duty Paid';
        $arr['inco']['DDU'] = 'Delivered Duty Unpaid';
        $arr['inco']['DEQ'] = 'Delivered ex quay (duty paid)';
        $arr['inco']['DES'] = 'Delivered ex ship';
        $arr['inco']['EXW'] = 'Ex Works';
        $arr['inco']['FAS'] = 'Free Alongside Ship';
        $arr['inco']['FCA'] = 'Free Carrier';
        $arr['inco']['FH'] =     'Free house';
        $arr['inco']['FOB'] =    'Free on board';
        $arr['inco']['FRK'] =    'Franco';
        $arr['inco']['UN'] =    'Not Free';


        // $arr['rfqservice']['line_num']   = 'EBELP';
        // $arr['rfqservice']['line_desc']  = 'KTEXT1';
        // $arr['rfqservice']['order_qty']  = 'MENGE';
        // $arr['rfqservice']['line_unit']  = 'MEINS';

        return $arr[$obj];
    }

    public static function getStringMaxRfq($type, $key)
    {
        $array = RfqHelper::mapApi($type);
        if (array_key_exists($key, $array)) {
            return $array[$key];
        } else {
            return null; // Atau sesuaikan dengan penanganan kesalahan yang kamu inginkan
        }
    }
}
