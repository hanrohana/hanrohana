<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finna_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->db2 = $this->load->database('db_kedua', TRUE);
    }
    public function select_Faktur($id = null)
    {
        $where1 = "WHERE
                    1=1 AND
                    M.INVOICEDATE = '07/28/2022' AND p.NAME like '%BURGER%' AND
                    M.Invoiceno not containing 'NR' AND M.Invoiceno not containing 'EC' AND
                    M.DeliveryOrder = '0'
                    order by M.InvoiceDate, M.InvoiceNo ASC";

        $query = "SELECT M.ARINVOICEID AS ID,M.INVOICENO AS NOFAKTUR, M.INVOICEDATE AS TGLFAKTUR, p.PERSONNO AS KDCUSTOMER, p.NAME AS CUSTOMER,
                iif(M.SHIPTO2 = (select distinct r.INFO2 from EXTENDEDDET r where r.EXTENDEDTYPEID = '5' and r.INFO2 = M.SHIPTO2),M.SHIPTO2,M.SHIPTO1) AS SHIPNAME,
                iif(M.SHIPTO2 = (select distinct r.INFO2 from EXTENDEDDET r where r.EXTENDEDTYPEID = '5' and r.INFO2 = M.SHIPTO2),M.SHIPTO3,P.ADDRESSLINE1) AS SHIPADDRESS,
                M.PURCHASEORDERNO AS PONO,
                cast(M.INVOICEAMOUNT AS INTEGER) AS NILAI, coalesce(adm.INFO2,'-') AS ADMPIUTANG, cast(left(e1.CUSTOMFIELD15,10) as date) AS ARTERIMA, top.INFO1 AS TOP
                from ARINV M
                left outer join PERSONDATA p on p.ID = M.CUSTOMERID
                left outer join EXTENDED e on e.EXTENDEDID = p.EXTENDEDID
                left outer join EXTENDEDDET adm on adm.EXTENDEDDETID = e.LOOKUP7
                left outer join EXTENDEDDET top on top.EXTENDEDDETID = e.LOOKUP20
                left outer join EXTENDED e1 on e1.EXTENDEDID = M.EXTENDEDID
                $where1";
        return $this->db2->query($query, $where1);
    }
}


/* End of file Finna_model.php and path \application\models\Finna_model.php */
