<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Base_model', 'base');
        $this->load->model('Logbook_model', 'logbook');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('transaksi', 'Transaksi', 'required|in_list[logbook,pelatihan]');
        $this->form_validation->set_rules('tanggal', 'Periode Tanggal', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Rekap data";
            $input = $this->input->post(NULL, TRUE);

            // var_dump(date('Y-m-d', strtotime('12/05/2022')));
            $this->template->load('template', 'laporan/form', $data);
        } else {

            $input = $this->input->post(null, true);
            $table = $input['transaksi'];
            $tanggal = $input['tanggal'];
            $pecah = explode(' - ', $tanggal);
            $dateMasuk = new DateTime();
            $dateKeluar = new DateTime();
            $mulai = date('Y-m-d', strtotime($pecah[0]));
            $akhir = date('Y-m-d', strtotime(end($pecah)));

            $query = '';
            if ($table == 'logbook') {
                // $query = $this->base->getBarangMasuk(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
                // $query = $this->base_model->get('id', array('mutation' => 'masuk'), ['mulai' => $mulai, 'akhir' => $akhir]);
                $query = $this->logbook->get_rekap_user(userdata('id_user'), ['mulai' => $mulai, 'akhir' => $akhir])->result_array();
                //$data['categori'] = $this->base_model->get('categori');
            } else {
                $query = $pelatihan = $this->base->get('pelatihan', 'id_pelatihan', ['user_id' => userdata('id_user')])->result_array();
            }

            $dateMasuk = new DateTime($mulai);
            $dateKeluar = new DateTime($akhir);
            $newMulai = $dateMasuk->format('d F Y');
            $newKeluar = $dateKeluar->format('d F Y');
            $this->_cetak($query, $table, $tanggal, $newKeluar, $newMulai);
            // var_dump($query);
            // print_r($query);
        }
    }

    private function _cetak($data, $table_, $tanggal, $newKeluar, $newMulai)
    {
        $this->load->library('CustomPDF');
        $table = $table_ == 'logbook' ? 'Logbook' : 'Pelatihan';
        // $dateMasuk = new DateTime($tanggal);

        error_reporting(0);

        $pdf = new FPDF();
        $pdf->AddPage('P', 'A4');
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(190, 7, 'Laporan ' . $table, 0, 1, 'C');
        $pdf->Ln();

        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(25, 7, 'Tanggal', 0, 0, 'L');
        $pdf->Cell(3, 7, ':', 0, 0, 'L');
        $pdf->Cell(60, 7, $newMulai . ' - ' . $newKeluar, 0, 1, 'L');
        // $pdf->Ln();
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(25, 7, 'Nama User', 0, 0, 'L');
        $pdf->Cell(3, 7, ':', 0, 0, 'L');
        $pdf->Cell(60, 7, userdata('nama'), 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->SetFont('Times', 'B', 11);

        if ($table_ == 'logbook') :
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(145, 7, 'PK', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Jumlah pilih', 1, 0, 'C');
            $pdf->Ln();
            $no = 1;
            foreach ($data as $key => $d) {
                $pdf->SetFont('Times', '', 11);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(145, 7, $d['kode'], 1, 0, 'C');
                $pdf->Cell(35, 7, $d['count'], 1, 0, 'C');
                $pdf->Ln();
            }
        else :
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(95, 7, 'Nama Pelatihan', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Tanggal', 1, 0, 'C');
            $pdf->Cell(55, 7, 'SKP', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            $subtotal = 0;
            foreach ($data as $d) {
                $dateMasuk = new DateTime($d['tanggal']);
                    $subtotal += $d['amount'];
                    $pdf->SetFont('Times', '', 11);
                    $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                    $pdf->Cell(95, 7, $d['nama_pelatihan'], 1, 0, 'C');
                    $pdf->Cell(35, 7, $dateMasuk->format('d F Y'), 1, 0, 'C');
                    $pdf->Cell(55, 7, $d['skp'], 1, 0, 'C');
                    $pdf->Ln();
            }
        //echo "Ini keluar";
        endif;
        $pdf->SetFont('Times', 'B', 11);
        // $pdf->Cell(155, 7, 'Total   ', 0, 0, 'R');
        // $pdf->Cell(40, 7, 'Rp . ' . number_format($subtotal), 1, 0, 'R');
        $pdf->Ln();

        $file_name = userdata('nama') . ' ' . $table . '-' . $tanggal;
        $pdf->Output('I', $file_name);
    }
}
