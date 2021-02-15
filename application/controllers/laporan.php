<?php
	class laporan extends Ci_Controller{
		public function __construct(){
            parent::__construct();
            $this->load->model('laporan_model');
            $this->load->model('laporan_rugi_laba_model');
    	}

    	public function laporan_pemasukan(){
	    	$username=$this->session->userdata('username');
			if($username!=""){
				$this->template->load('template','laporan_pemasukan/index');
			}
			else{
				$this->session->set_flashdata('confirm','Silahkan Login Dahulu');
				redirect('login');
			}
    	}

        public function laporan_pemasukan_besar(){
            $username=$this->session->userdata('username');
            if($username!=""){
                $this->template->load('template','laporan_pemasukan_besar/index');
            }
            else{
                $this->session->set_flashdata('confirm','Silahkan Login Dahulu');
                redirect('login');
            }
        }

        public function laporan_pemasukan_rekening(){
            $username=$this->session->userdata('username');
            if($username!=""){
                $this->template->load('template','laporan_pemasukan_rekening/index');
            }
            else{
                $this->session->set_flashdata('confirm','Silahkan Login Dahulu');
                redirect('login');
            }
        }

    	public function tampil_laporan_pemasukan(){
    		$bulan=$this->input->post('bulan');
    		$tahun=$this->input->post('tahun');
    		$data['bulan']=$bulan;
    		$data['tahun']=$tahun;
    		$data['laporan_pemasukan']=$this->laporan_model->laporan_pemasukan($bulan,$tahun);
            $data['jumlah_pemasukan']=$this->laporan_model->jumlah_pemasukan($bulan,$tahun);
    		$this->load->view('laporan_pemasukan/tampil',$data);
    	}

        public function tampil_laporan_pemasukan_besar(){
            $bulan=$this->input->post('bulan');
            $tahun=$this->input->post('tahun');
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;
            $data['laporan_pemasukan_besar']=$this->laporan_model->laporan_pemasukan_besar($bulan,$tahun);
            $data['jumlah_pemasukan_besar']=$this->laporan_model->jumlah_pemasukan_besar($bulan,$tahun);
            $this->load->view('laporan_pemasukan_besar/tampil',$data);
        }

        public function tampil_laporan_pemasukan_rekening(){
            $bulan=$this->input->post('bulan');
            $tahun=$this->input->post('tahun');
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;
            $data['laporan_pemasukan_rekening']=$this->laporan_model->laporan_pemasukan_rekening($bulan,$tahun);
            $data['jumlah_pemasukan_rekening']=$this->laporan_model->jumlah_pemasukan_rekening($bulan,$tahun);
            $this->load->view('laporan_pemasukan_rekening/tampil',$data);
        }

        


    	public function laporan_pemasukan_excel(){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=laporan_pemasukan.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $bulan=$this->uri->segment(4);
            $tahun=$this->uri->segment(3);
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;
            ?>
            <div align="center"> Laporan Pemasukan Berkah Sistem Kas Kecil bulan <?php echo convert_bulan($bulan); ?>  tahun <?php echo $tahun;?></div>
            <?php
            $data['jumlah_pemasukan']=$this->laporan_model->jumlah_pemasukan($bulan,$tahun);
            $data['laporan_pemasukan']=$this->laporan_model->laporan_pemasukan($bulan,$tahun);
            $this->load->view('laporan_pemasukan/tampil_excel',$data);
    	}

        public function laporan_pemasukan_besar_excel(){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=laporan_pemasukan_besar.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $bulan=$this->uri->segment(4);
            $tahun=$this->uri->segment(3);
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;
            ?>
            <div align="center"> Laporan Pemasukan Berkah Sistem Kas Besar bulan <?php echo convert_bulan($bulan); ?>  tahun <?php echo $tahun;?></div>
            <?php
            $data['jumlah_pemasukan_besar']=$this->laporan_model->jumlah_pemasukan_besar($bulan,$tahun);
            $data['laporan_pemasukan_besar']=$this->laporan_model->laporan_pemasukan_besar($bulan,$tahun);
            $this->load->view('laporan_pemasukan_besar/tampil_excel',$data);
        }

        public function laporan_pemasukan_rekening_excel(){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=laporan_pemasukan_rekening.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $bulan=$this->uri->segment(4);
            $tahun=$this->uri->segment(3);
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;
            ?>
            <div align="center"> Laporan Pemasukan Rekening Berkah Sistem bulan <?php echo convert_bulan($bulan); ?>  tahun <?php echo $tahun;?></div>
            <?php
            $data['jumlah_pemasukan_rekening']=$this->laporan_model->jumlah_pemasukan_rekeneing($bulan,$tahun);
            $data['laporan_pemasukan_rekening']=$this->laporan_model->laporan_pemasukan_rekening($bulan,$tahun);
            $this->load->view('laporan_pemasukan_rekening/tampil_excel',$data);
        }

        public function laporan_pengeluaran(){
            $username=$this->session->userdata('username');
            if($username!=""){
                $this->template->load('template','laporan_pengeluaran/index');
            }
            else{
                $this->session->set_flashdata('confirm','Silahkan Login Dahulu');
                redirect('login');
            }
        }

        public function tampil_laporan_pengeluaran(){
            $bulan=$this->input->post('bulan');
            $tahun=$this->input->post('tahun');
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;
            $data['jumlah_pengeluaran']=$this->laporan_model->jumlah_pengeluaran($bulan,$tahun);
            $data['laporan_pengeluaran']=$this->laporan_model->laporan_pengeluaran($bulan,$tahun);
            $this->load->view('laporan_pengeluaran/tampil',$data);
        }

        public function laporan_pengeluaran_excel(){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=laporan_pengluaran.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $bulan=$this->uri->segment(4);
            $tahun=$this->uri->segment(3);
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;
            ?>
            <div align="center"> Laporan Pengeluaran Berkah Sistem bulan <?php echo convert_bulan($bulan); ?>  tahun <?php echo $tahun;?></div>
            <?php
            $data['jumlah_pengeluaran']=$this->laporan_model->jumlah_pengeluaran($bulan,$tahun);
            $data['laporan_pengeluaran']=$this->laporan_model->laporan_pengeluaran($bulan,$tahun);
            $this->load->view('laporan_pengeluaran/tampil_excel',$data);
        }

        public function laporan_pengeluaran_besar(){
            $username=$this->session->userdata('username');
            if($username!=""){
                $this->template->load('template','laporan_pengeluaran_besar/index');
            }
            else{
                $this->session->set_flashdata('confirm','Silahkan Login Dahulu');
                redirect('login');
            }
        }

        public function tampil_laporan_pengeluaran_besar(){
            $bulan=$this->input->post('bulan');
            $tahun=$this->input->post('tahun');
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;
            $data['jumlah_pengeluaran']=$this->laporan_model->jumlah_pengeluaran_besar($bulan,$tahun);
            $data['laporan_pengeluaran']=$this->laporan_model->laporan_pengeluaran_besar($bulan,$tahun);
            $this->load->view('laporan_pengeluaran_besar/tampil',$data);
        }

        public function laporan_pengeluaran_besar_excel(){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=laporan_pengeluaran_besar.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $bulan=$this->uri->segment(4);
            $tahun=$this->uri->segment(3);
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;
            ?>
            <div align="center"> Laporan Pengeluaran Besar Berkah Sistem bulan <?php echo convert_bulan($bulan); ?>  tahun <?php echo $tahun;?></div>
            <?php
            $data['jumlah_pengeluaran']=$this->laporan_model->jumlah_pengeluaran_besar($bulan,$tahun);
            $data['laporan_pengeluaran']=$this->laporan_model->laporan_pengeluaran_besar($bulan,$tahun);
            $this->load->view('laporan_pengeluaran_besar/tampil_excel',$data);
        }


        public function laporan_umum(){
            $username=$this->session->userdata('username');
            if($username!=""){
                $this->template->load('template','laporan_umum/index');
            }
            else{
                $this->session->set_flashdata('confirm','Silahkan Login Dahulu');
                redirect('login');
            }
        }



        public function tampil_laporan_umum(){
            $bulan=$this->input->post('bulan');
            $tahun=$this->input->post('tahun');
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;
            ?>
            <table class="table table-hover table table-bordered">
                <thead>
                <tr bgcolor="#c1c1c5">
                    <td width="5%">No</td><td width="10%">Tanggal</td><td width="10%">Kode Akun</td><td width="18%">Keterangan</td><td width="20%">Debet</td><td width="20%">Kredit</td><td width="21%">Saldo Akhir</td>
                </tr>
                </thead>
            <?php
            $no=0;
            $jumlah_pemasukan=$this->laporan_model->jumlah_pemasukan($bulan,$tahun);
            $jumlah_pengeluaran=$this->laporan_model->jumlah_pengeluaran($bulan,$tahun);
            $saldo=$this->laporan_model->laporan_saldo();

            


            for ($tanggal=1; $tanggal <=31 ; $tanggal++) {
                $laporan_pengeluaran_umum=$this->laporan_model->laporan_pengeluaran_umum($tanggal,$bulan,$tahun);  
                $laporan_pemasukan_umum=$this->laporan_model->laporan_pemasukan_umum($tanggal,$bulan,$tahun);
                    foreach ($laporan_pemasukan_umum->result_array() as $tampil) {
                        $no++;
                        ?>
                        <tr >
                            <td><?php echo $no;?></td>
                            <td><?php echo $tanggal." - ".convert_bulan($bulan)." - ".$tahun;?></td>
                            <td><?php echo $tampil['kode_akun'];?></td>
                            <td><?php echo $tampil['nama_pemasukan'];?></td>
                            <td ><?php echo buatrp($tampil['jumlah_pemasukan']);?></td>
                            <td>-</td>
                            <td><?php echo buatrp($tampil['saldo_akhir']);?></td>
                        </tr>
                        <?php
                    }
                    foreach ($laporan_pengeluaran_umum->result_array() as $tampil) {
                        $no++;
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $tanggal." - ".convert_bulan($bulan)." - ".$tahun;?></td>
                            <td><?php echo $tampil['kode_akun'];?></td>
                            <td><?php echo $tampil['nama_pengeluaran'];?></td>
                            <td>-</td>
                            <td><?php echo buatrp($tampil['jumlah_pengeluaran']);?></td>
                            <td><?php echo buatrp($tampil['saldo_akhir']);?></td>
                        </tr>
                        <?php
                    }
            }
                if($no==0){
                    echo "Data tidak ada";
                }
                else{       
                    ?>
                    </table>
                    <table class="table table-striped" style="width:500px; float:right;">
                        <tr>
                            <td>Jumlah Pemasukan</td>
                            <td width="10%">:</td>
                            <td>
                                <?php
                                    foreach ($jumlah_pemasukan->result_array() as $tampil) {
                                        echo buatrp($tampil['jumlah_pemasukan']);
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Pengeluaran</td>
                            <td width="10%">:</td>
                            <td>
                                <?php
                                    foreach ($jumlah_pengeluaran->result_array() as $tampil) {
                                        echo buatrp($tampil['jumlah_pengeluaran']);
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Saldo Akhir</td>
                            <td width="10%">:</td>
                            <td>
                                <?php
                                    foreach ($saldo->result_array() as $tampil) {
                                        echo buatrp($tampil['saldo_total']);
                                    }
                                ?>
                            </td>
                        </tr>
                    </table><br><br><br><br><br><br><br><br>
                    <a href="<?php echo base_url();?>laporan/tampil_laporan_umum_excel/<?php echo $bulan;?>/<?php echo $tahun;?>"><button class="btn" style="float:right;"><i class="icon icon-file"></i>Export</button></a>
                    <?php
            }
        }

        public function tampil_laporan_umum_excel(){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=laporan_umum.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $bulan=$this->uri->segment(3);
            $tahun=$this->uri->segment(4);
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;
            ?>
            <table class="table table-striped" border="1">
                <thead>
                <tr bgcolor="#c1c1c5">
                    <td width="5%">No</td><td width="10%">Tanggal</td><td width="10%">Kode Akun</td><td width="18%">Keterangan</td><td width="20%">Debet</td><td width="20%">Kredit</td><td width="21%">Saldo Akhir</td>
                </tr>
                </thead>
            <?php
            $no=0;
            $jumlah_pemasukan=$this->laporan_model->jumlah_pemasukan($bulan,$tahun);
            $jumlah_pengeluaran=$this->laporan_model->jumlah_pengeluaran($bulan,$tahun);
            $saldo=$this->laporan_model->laporan_saldo();
            for ($tanggal=1; $tanggal <=31 ; $tanggal++) {
                $laporan_pengeluaran_umum=$this->laporan_model->laporan_pengeluaran_umum($tanggal,$bulan,$tahun);  
                $laporan_pemasukan_umum=$this->laporan_model->laporan_pemasukan_umum($tanggal,$bulan,$tahun);
                    foreach ($laporan_pemasukan_umum->result_array() as $tampil) {
                        $no++;
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $tanggal." - ".convert_bulan($bulan)." - ".$tahun;?></td>
                            <td><?php echo $tampil['kode_akun'];?></td>
                            <td><?php echo $tampil['nama_pemasukan'];?></td>
                            <td><?php echo buatrp($tampil['jumlah_pemasukan']);?></td>
                            <td>-</td>
                            <td><?php echo buatrp($tampil['saldo_akhir']);?></td>
                        </tr>
                        <?php
                    }
                    foreach ($laporan_pengeluaran_umum->result_array() as $tampil) {
                        $no++;
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $tanggal." - ".convert_bulan($bulan)." - ".$tahun;?></td>
                            <td><?php echo $tampil['kode_akun'];?></td>
                            <td><?php echo $tampil['nama_pengeluaran'];?></td>
                            <td>-</td>
                            <td><?php echo buatrp($tampil['jumlah_pengeluaran']);?></td>
                            <td><?php echo buatrp($tampil['saldo_akhir']);?></td>
                        </tr>
                        <?php
                    }
            }

                if($no==0){
                    echo "Data tidak ada";
                }       
            ?><br>
            </table>
            <table class="table table-striped" style="width:500px; float:right;">
                </td><td></td><td></td><td></td><td></td>
                    <td>Jumlah Pemasukan</td>
                    <td width="10%">:</td>
                    <td>
                        <?php
                            foreach ($jumlah_pemasukan->result_array() as $tampil) {
                                echo buatrp($tampil['jumlah_pemasukan']);
                            }
                        ?>
                    </td>
                </tr>
                </td><td></td><td></td><td></td><td></td>
                    <td>Jumlah Pengeluaran</td>
                    <td width="10%">:</td>
                    <td>
                        <?php
                            foreach ($jumlah_pengeluaran->result_array() as $tampil) {
                                echo buatrp($tampil['jumlah_pengeluaran']);
                            }
                        ?>
                    </td>
                </tr>
                </td><td></td><td></td><td></td><td></td>
                    <td>Saldo Akhir</td>
                    <td width="10%">:</td>
                    <td>
                        <?php
                            foreach ($saldo->result_array() as $tampil) {
                                echo buatrp($tampil['saldo_total']);
                            }
                        ?>
                    </td>
                </tr>
            </table><br><br><br><br><br><br><br><br>
            <?php
        }


        public function laporan_umum_besar(){
            $username=$this->session->userdata('username');
            if($username!=""){
                $this->template->load('template','laporan_umum_besar/index');
            }
            else{
                $this->session->set_flashdata('confirm','Silahkan Login Dahulu');
                redirect('login');
            }
        }

        public function tampil_laporan_umum_besar(){
            $bulan=$this->input->post('bulan');
            $tahun=$this->input->post('tahun');
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;
            ?>
            <table class="table table-hover table table-bordered">
                <thead>
                <tr bgcolor="#c1c1c5">
                    <td width="5%">No</td><td width="10%">Tanggal</td><td width="10%">Kode Akun</td><td width="18%">Keterangan</td><td width="20%">Debet</td><td width="20%">Kredit</td><td width="21%">Saldo Akhir</td>
                </tr>
                </thead>
            <?php
            $no=0;
            $jumlah_pemasukan=$this->laporan_model->jumlah_pemasukan_besar($bulan,$tahun);
            $jumlah_pengeluaran=$this->laporan_model->jumlah_pengeluaran_besar($bulan,$tahun);
            $saldo=$this->laporan_model->laporan_saldo_besar();
            for ($tanggal=1; $tanggal <=31 ; $tanggal++) {
                $laporan_pengeluaran_umum=$this->laporan_model->laporan_pengeluaran_umum_besar($tanggal,$bulan,$tahun);  
                $laporan_pemasukan_umum=$this->laporan_model->laporan_pemasukan_umum_besar($tanggal,$bulan,$tahun);
                    foreach ($laporan_pemasukan_umum->result_array() as $tampil) {
                        $no++;
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $tanggal." - ".convert_bulan($bulan)." - ".$tahun;?></td>
                            <td><?php echo $tampil['akun1'];?><?php echo $tampil['akun2'];?></td>
                            <td><?php echo $tampil['nama_pemasukan'];?></td>
                            <td><?php echo buatrp($tampil['jumlah_pemasukan']);?></td>
                            <td>-</td>
                            <td><?php echo buatrp($tampil['saldo_akhir']);?></td>
                        </tr>
                        <?php
                    }
                    foreach ($laporan_pengeluaran_umum->result_array() as $tampil) {
                        $no++;
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $tanggal." - ".convert_bulan($bulan)." - ".$tahun;?></td>
                            <td><?php echo $tampil['akuna'];?><?php echo $tampil['akunb'];?></td>
                            <td><?php echo $tampil['nama_pengeluaran'];?></td>
                            <td>-</td>
                            <td><?php echo buatrp($tampil['jumlah_pengeluaran']);?></td>
                            <td><?php echo buatrp($tampil['saldo_akhir']);?></td>
                        </tr>
                        <?php
                    }
            }
                if($no==0){
                    echo "Data tidak ada";
                }
                else{       
                    ?>
                    </table>
                    <table class="table table-striped" style="width:500px; float:right;">
                        <tr>
                            <td>Jumlah Pemasukan</td>
                            <td width="10%">:</td>
                            <td>
                                <?php
                                    foreach ($jumlah_pemasukan->result_array() as $tampil) {
                                        echo buatrp($tampil['jumlah_pemasukan']);
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Pengeluaran</td>
                            <td width="10%">:</td>
                            <td>
                                <?php
                                    foreach ($jumlah_pengeluaran->result_array() as $tampil) {
                                        echo buatrp($tampil['jumlah_pengeluaran']);
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Saldo Akhir</td>
                            <td width="10%">:</td>
                            <td>
                                <?php
                                    foreach ($saldo->result_array() as $tampil) {
                                        echo buatrp($tampil['saldo_total']);
                                    }
                                ?>
                            </td>
                        </tr>
                    </table><br><br><br><br><br><br><br><br>
                    <a href="<?php echo base_url();?>laporan/tampil_laporan_umum_besar_excel/<?php echo $bulan;?>/<?php echo $tahun;?>"><button class="btn" style="float:right;"><i class="icon icon-file"></i>Export</button></a>
                    <?php
            }
        }

        public function tampil_laporan_umum_besar_excel(){
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=laporan_umum_besar.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $bulan=$this->uri->segment(3);
            $tahun=$this->uri->segment(4);
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;
            ?>
            <table class="table table-striped" border="1">
                <thead>
                <tr bgcolor="#c1c1c5">
                    <td width="5%">No</td><td width="10%">Tanggal</td><td width="10%">Kode Akun</td><td width="18%">Keterangan</td><td width="20%">Debet</td><td width="20%">Kredit</td><td width="21%">Saldo Akhir</td>
                </tr>
                </thead>
            <?php
            $no=0;
            $jumlah_pemasukan=$this->laporan_model->jumlah_pemasukan_besar($bulan,$tahun);
            $jumlah_pengeluaran=$this->laporan_model->jumlah_pengeluaran_besar($bulan,$tahun);
            $saldo=$this->laporan_model->laporan_saldo();
            for ($tanggal=1; $tanggal <=31 ; $tanggal++) {
                $laporan_pengeluaran_umum=$this->laporan_model->laporan_pengeluaran_umum_besar($tanggal,$bulan,$tahun);  
                $laporan_pemasukan_umum=$this->laporan_model->laporan_pemasukan_umum_besar($tanggal,$bulan,$tahun);
                    foreach ($laporan_pemasukan_umum->result_array() as $tampil) {
                        $no++;
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $tanggal." - ".convert_bulan($bulan)." - ".$tahun;?></td>
                            <td><?php echo $tampil['akun1'];?><?php echo $tampil['akun2'];?></td>
                            <td><?php echo $tampil['nama_pemasukan'];?></td>
                            <td><?php echo buatrp($tampil['jumlah_pemasukan']);?></td>
                            <td>-</td>
                            <td><?php echo buatrp($tampil['saldo_akhir']);?></td>
                        </tr>
                        <?php
                    }
                    foreach ($laporan_pengeluaran_umum->result_array() as $tampil) {
                        $no++;
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $tanggal." - ".convert_bulan($bulan)." - ".$tahun;?></td>
                            <td><?php echo $tampil['akuna'];?><?php echo $tampil['akunb'];?></td>
                            <td><?php echo $tampil['nama_pengeluaran'];?></td>
                            <td>-</td>
                            <td><?php echo buatrp($tampil['jumlah_pengeluaran']);?></td>
                            <td><?php echo buatrp($tampil['saldo_akhir']);?></td>
                        </tr>
                        <?php
                    }
            }

                if($no==0){
                    echo "Data tidak ada";
                }       
            ?><br>
            </table>
            <table class="table table-striped" style="width:500px; float:right;">
                </td><td></td><td></td><td></td><td></td>
                    <td>Jumlah Pemasukan</td>
                    <td width="10%">:</td>
                    <td>
                        <?php
                            foreach ($jumlah_pemasukan->result_array() as $tampil) {
                                echo buatrp($tampil['jumlah_pemasukan']);
                            }
                        ?>
                    </td>
                </tr>
                </td><td></td><td></td><td></td><td></td>
                    <td>Jumlah Pengeluaran</td>
                    <td width="10%">:</td>
                    <td>
                        <?php
                            foreach ($jumlah_pengeluaran->result_array() as $tampil) {
                                echo buatrp($tampil['jumlah_pengeluaran']);
                            }
                        ?>
                    </td>
                </tr>
                </td><td></td><td></td><td></td><td></td>
                    <td>Saldo Akhir</td>
                    <td width="10%">:</td>
                    <td>
                        <?php
                            foreach ($saldo->result_array() as $tampil) {
                                echo buatrp($tampil['saldo_total']);
                            }
                        ?>
                    </td>
                </tr>
            </table><br><br><br><br><br><br><br><br>
            <?php
        }


        public function laporan_rugi_laba(){
            $username=$this->session->userdata('username');
            if($username!=""){
                $this->template->load('template','laporan_rugi_laba/index');
            }
            else{
                $this->session->set_flashdata('confirm','Silahkan Login Dahulu');
                redirect('login');
            }
        }

        public function tampil_laporan_rugi_laba(){
            $bulan=$this->input->post('bulan');
            $tahun=$this->input->post('tahun');
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;
            ?>
            <div id="penuh">
                <div class="kiri">
            <table class="table table-hover table table-bordered" >
                <thead>
                    
                <tr bgcolor="#c1c1c5">
                   
                    <th  colspan="2"><div style="text-align:center;">Pemasukan</div></th>
                    
                    

                </tr>
                </thead>
            <?php
            
             $total_pemasukan=$this->laporan_rugi_laba_model->total_pemasukan($bulan,$tahun);
             $total_pemasukan_besar=$this->laporan_rugi_laba_model->total_pemasukan_besar($bulan,$tahun);
            for ($tanggal=1; $tanggal <=31 ; $tanggal++) {

                $laporan_rugi_laba_pemasukan=$this->laporan_rugi_laba_model->laporan_pemasukan($tanggal,$bulan,$tahun);
                foreach ($laporan_rugi_laba_pemasukan->result_array() as $tampil) {

                        
                       ?>
                        <tr>
                            
                            
                            
                            <td><?php echo $tampil['nama_akun'];?> </td>
                            <td><?php echo buatrp($tampil['jumlah']);?> </td>
                        </tr>

                        


                        <?php
                    }
                     

            }



            ?>
            <tr>
                             <td style="text-align:right"><b>Jumlah Pemasukan</b></td>
                            <td>
                        <?php
                            foreach ($total_pemasukan->result_array() as $tampil) {
                                
                                $data1 = $tampil['total1'];
                            }
                        ?>
                         <?php
                            foreach ($total_pemasukan_besar->result_array() as $tampil) {
                                
                                $data1b = $tampil['total2'];
                            }


                        ?>
                        <?php
                        $pemasukan_total = $data1 + $data1b; ?>
                        <?php echo buatrp($pemasukan_total); ?>
                    </td>
                        </tr>

            </table>
        </div>
        <div class="kanan">
            <?php

            ?>
            <table class="table table-hover table table-bordered" >
                <thead>
                    
                <tr bgcolor="#c1c1c5">
                   
                    <th  colspan="2"><div style="text-align:center;">Pengeluaran</div></th>
                    
                    
                    

                </tr>
                </thead>
            <?php
            
            $total_pengeluaran=$this->laporan_rugi_laba_model->total_pengeluaran($bulan,$tahun);
            $total_pengeluaran_besar=$this->laporan_rugi_laba_model->total_pengeluaran_besar($bulan,$tahun);
            for ($tanggal=1; $tanggal <=31 ; $tanggal++) {

               $laporan_rugi_laba_pengeluaran=$this->laporan_rugi_laba_model->laporan_pengeluaran($tanggal,$bulan,$tahun);
                foreach ($laporan_rugi_laba_pengeluaran->result_array() as $tampil) {

                        
                       ?>
                        <tr>
                            
                            
                            
                            <td><?php echo $tampil['nama_akun'];?> </td>
                            <td><?php echo buatrp($tampil['jumlah']);?> </td>
                           
                        


                        <?php
                    }

                   
                     







            }

            ?>
            <tr>
                            <td style="text-align:right"><b>Jumlah Pengeluaran</b></td>
                            <td>
                        <?php
                            foreach ($total_pengeluaran->result_array() as $tampil) {
                               
                                $data2 = $tampil['total1'];
                            }
                        ?>
                        <?php
                            foreach ($total_pengeluaran_besar->result_array() as $tampil) {
                                
                                $data2b = $tampil['total2'];
                            }


                        ?>
                        <?php
                        $pengeluaran_total = $data2 + $data2b; ?>
                        <?php echo buatrp($pengeluaran_total); ?>
                    </td>
                        </tr>

            </table>
        </div>
        </div>
        <?php

        $rugi_laba = $pemasukan_total - $pengeluaran_total;

        ?>

         <table class="table table-striped" style="width:500px; float:right;">
                </td><td></td><td></td><td></td><td></td>
                    <td>Rugi/Laba</td>
                    <td width="10%">:</td>
                    <td>
                        <?php echo buatrp($rugi_laba); ?>
                    </td>
                </tr>
               
                
            </table> 
            &nbsp;
            <br><br><br><br>
                    <a href="<?php echo base_url();?>laporan/tampil_laporan_rugi_laba_excel/<?php echo $bulan;?>/<?php echo $tahun;?>"><button class="btn" style="float:right;"><i class="icon icon-file"></i>Export</button></a>
                   
            <?php
            
        }


        public function tampil_laporan_rugi_laba_excel () {

            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=laporan_rugi_laba.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            $bulan=$this->uri->segment(3);
            $tahun=$this->uri->segment(4);
            $data['bulan']=$bulan;
            $data['tahun']=$tahun;

            ?>
            <div id="penuh">
                <div class="kiri">
            <table class="table table-hover table table-bordered" >
                <thead>
                    
                <tr bgcolor="#c1c1c5">
                   
                    <th  colspan="2"><div style="text-align:center;">Pemasukan</div></th>
                    
                    

                </tr>
                </thead>
            <?php
            
             $total_pemasukan=$this->laporan_rugi_laba_model->total_pemasukan($bulan,$tahun);
             $total_pemasukan_besar=$this->laporan_rugi_laba_model->total_pemasukan_besar($bulan,$tahun);
            for ($tanggal=1; $tanggal <=31 ; $tanggal++) {

                $laporan_rugi_laba_pemasukan=$this->laporan_rugi_laba_model->laporan_pemasukan($tanggal,$bulan,$tahun);
                foreach ($laporan_rugi_laba_pemasukan->result_array() as $tampil) {

                        
                       ?>
                        <tr>
                            
                            
                            
                            <td><?php echo $tampil['nama_akun'];?> </td>
                            <td><?php echo buatrp($tampil['jumlah']);?> </td>
                        </tr>

                        


                        <?php
                    }
                     

            }



            ?>
            <tr>
                             <td style="text-align:right"><b>Jumlah Pemasukan</b></td>
                            <td>
                        <?php
                            foreach ($total_pemasukan->result_array() as $tampil) {
                                
                                $data1 = $tampil['total1'];
                            }
                        ?>
                         <?php
                            foreach ($total_pemasukan_besar->result_array() as $tampil) {
                                
                                $data1b = $tampil['total2'];
                            }


                        ?>
                        <?php
                        $pemasukan_total = $data1 + $data1b; ?>
                        <?php echo buatrp($pemasukan_total); ?>
                    </td>
                        </tr>

            </table>
        </div>
        <div class="kanan">
            <?php

            ?>
            <table class="table table-hover table table-bordered" >
                <thead>
                    
                <tr bgcolor="#c1c1c5">
                   
                    <th  colspan="2"><div style="text-align:center;">Pengeluaran</div></th>
                    
                    
                    

                </tr>
                </thead>
            <?php
            
            $total_pengeluaran=$this->laporan_rugi_laba_model->total_pengeluaran($bulan,$tahun);
            $total_pengeluaran_besar=$this->laporan_rugi_laba_model->total_pengeluaran_besar($bulan,$tahun);
            for ($tanggal=1; $tanggal <=31 ; $tanggal++) {

               $laporan_rugi_laba_pengeluaran=$this->laporan_rugi_laba_model->laporan_pengeluaran($tanggal,$bulan,$tahun);
                foreach ($laporan_rugi_laba_pengeluaran->result_array() as $tampil) {

                        
                       ?>
                        <tr>
                            
                            
                            
                            <td><?php echo $tampil['nama_akun'];?> </td>
                            <td><?php echo buatrp($tampil['jumlah']);?> </td>
                           
                        


                        <?php
                    }

                   
                     







            }

            ?>
            <tr>
                            <td style="text-align:right"><b>Jumlah Pengeluaran</b></td>
                            <td>
                        <?php
                            foreach ($total_pengeluaran->result_array() as $tampil) {
                               
                                $data2 = $tampil['total1'];
                            }
                        ?>
                        <?php
                            foreach ($total_pengeluaran_besar->result_array() as $tampil) {
                                
                                $data2b = $tampil['total2'];
                            }


                        ?>
                        <?php
                        $pengeluaran_total = $data2 + $data2b; ?>
                        <?php echo buatrp($pengeluaran_total); ?>
                    </td>
                        </tr>

            </table>
        </div>
        </div>
        <?php

        $rugi_laba = $pemasukan_total - $pengeluaran_total;

        ?>

         <table class="table table-striped" style="width:500px; float:right;">
                </td><td></td><td></td><td></td><td></td>
                    <td>Rugi/Laba</td>
                    <td width="10%">:</td>
                    <td>
                        <?php echo buatrp($rugi_laba); ?>
                    </td>
                </tr>
               
                
            </table> 
           
            <?php



        }



	}
