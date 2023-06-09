using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Data.OleDb;
using System.Windows.Forms;

namespace stajyer_takip_uygulamasi
{
    public partial class frmAnaEkran : Form
    {
        public frmAnaEkran()
        {
            InitializeComponent();
        }
        OleDbConnection baglanti = new OleDbConnection("Provider=Microsoft.ACE.OLEDB.12.0;Data Source=" + Application.StartupPath.ToString() + "\\veritabanidb.accdb");
        DataSet dtst = new DataSet();
        OleDbDataAdapter adtr = new OleDbDataAdapter();
        OleDbCommand komut;
       OleDbDataReader dr;
        DataTable table;
        Form frmOgrenci = new Form();

        /* OleDbConnection baglanti = new OleDbConnection("Provider=Microsoft.ACE.OLEDB.12.0;Data Source=veritabanidb.accdb");
       OleDbCommand komut;
       OleDbDataAdapter da;
       OleDbDataReader dr;
       DataSet ds = new DataSet();
       */


        /* 
             */
      


        public void yenile()
        {
            try
            {
                dataGridView1.Visible = true;
                dataGridView1.Columns.Clear();
                dtst.Tables.Clear();
                dataGridView1.Refresh();
                baglanti.Open();

                OleDbDataAdapter adtr = new OleDbDataAdapter("select * From ogrenciler", baglanti);
                adtr.Fill(dtst, "ogrenci");
                dataGridView1.DataSource = dtst.Tables[0];
                dataGridView1.Columns[0].HeaderText = "Öğrenci Numarası";
                dataGridView1.Columns[1].HeaderText = "Öğrenci Adı";
                dataGridView1.Columns[2].HeaderText = "Öğrenci Soyadı";
                dataGridView1.Columns[3].HeaderText = "Firma Adı";
                dataGridView1.Columns[4].HeaderText = "Firma Alanı";
                dataGridView1.Columns[5].HeaderText = "Staja Başlama Tarihi";
                dataGridView1.Columns[6].HeaderText = "Staj Bitiş Tarihi";
                dataGridView1.Columns[7].HeaderText = "Başarı Notu";
                dataGridView1.Columns[8].HeaderText = "Durumu";
                dataGridView1.Columns[0].Width = 140;
                dataGridView1.Columns[1].Width = 130;
                dataGridView1.Columns[2].Width = 130;
                dataGridView1.Columns[3].Width = 140;
                dataGridView1.Columns[4].Width = 120;
                dataGridView1.Columns[5].Width = 120;
                dataGridView1.Columns[6].Width = 110;
                dataGridView1.Columns[7].Width = 110;
                dataGridView1.Columns[8].Width = 122;
                baglanti.Close();
            }
            catch (Exception r)
            {

                MessageBox.Show(r.ToString());
            }
        }
        private void frmGuncelle_Click(object sender, EventArgs e)
        {
            yenile();
            dataGridView1.Refresh();
            int tabloToplami = dataGridView1.RowCount - 1;
            dataGridView1.Visible = true;
            label2.Text = "Kayıtlı öğrenci sayısı: " + tabloToplami + "";

        }
        public void ilkDegerGonder()
        {
            gonderNo = dataGridView1.Rows[0].Cells["ogrenciNo"].Value.ToString();
            gonderAd = dataGridView1.Rows[0].Cells["Ad"].Value.ToString();
            gonderSoyad = dataGridView1.Rows[0].Cells["Soyad"].Value.ToString();
            gonderFirma = dataGridView1.Rows[0].Cells["Firma_Adı"].Value.ToString();
            gonderNot = Convert.ToDouble(dataGridView1.Rows[0].Cells["Basari_Notu"].Value.ToString());
            gonderAlan = dataGridView1.Rows[0].Cells["Firma_Alanı"].Value.ToString();
            gonderTarih = dataGridView1.Rows[0].Cells["Staj_Baslangic"].Value.ToString();
            gonderTarihBitis = dataGridView1.Rows[0].Cells["Staj_Bitis"].Value.ToString();
        }
        private void frmAnaEkran_Load(object sender, EventArgs e)
        {
            
            yenile();
            dataGridView1.Refresh();
            ilkDegerGonder();
            int tabloToplami = dataGridView1.RowCount - 1;
            dataGridView1.Visible = true;
            label2.Text = "Kayıtlı öğrenci sayısı: " + tabloToplami + "";
            comboAnaEkran.Text = "Öğrenci Numarasına";
            try
            {
               
                String bugun = DateTime.Now.ToString().Substring(0, 10);
                string tamamladi = "Tamamladı";
                string devamEdiyor = "Devam Ediyor";
                baglanti.Open();
                komut = new OleDbCommand("select * from ogrenciler where Durumu='"+ devamEdiyor+"'", baglanti);
                dr = komut.ExecuteReader();
                if (dr.Read())
                {
                    komut = new OleDbCommand("UPDATE ogrenciler SET Durumu='"+ tamamladi+ "' WHERE Staj_Bitis like '" + bugun + "%'", baglanti);
                    komut.ExecuteNonQuery();
                }
                baglanti.Close();

                yenile();
                dataGridView1.Refresh();
            }

            catch (Exception r)
            {

                MessageBox.Show(r.ToString());
            }


        }

        private void button1_Click(object sender, EventArgs e)
        {
            frmOgrenciEkle frm = new frmOgrenciEkle();
            frm.ShowDialog();

        }

        private void button2_Click(object sender, EventArgs e)
        {
            frmOgrenciSil frm = new frmOgrenciSil();
            frm.ShowDialog();

        }

        private void button3_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void button4_Click(object sender, EventArgs e)
        {
           
        }

       public string gonderNo, gonderAd, gonderSoyad, gonderTarih, gonderFirma, gonderAlan,gonderTarihBitis;
        public string filtre;


        public void FiltrelemeDetay(string degerFiltre, string durumm)
        {
            if (degerFiltre=="ogrenciNo")
            {
                adtr = new OleDbDataAdapter("select * from ogrenciler where Durumu='" + durumm + "' and  ogrenciNo like '%" + textBoxAnaEkran.Text + "%'", baglanti);
            }
            if (degerFiltre == "Ad")
            {
                adtr = new OleDbDataAdapter("select * from ogrenciler where Durumu='" + durumm + "' and  Ad like '%" + textBoxAnaEkran.Text + "%'", baglanti);
            }
            if (degerFiltre == "Soyad")
            {
                adtr = new OleDbDataAdapter("select * from ogrenciler where Durumu='" + durumm + "' and  Soyad like '%" + textBoxAnaEkran.Text + "%'", baglanti);
            }
            if (degerFiltre == "Firma_Alanı")
            {
                adtr = new OleDbDataAdapter("select * from ogrenciler where Durumu='" + durumm + "' and  Firma_Alanı like '%" + textBoxAnaEkran.Text + "%'", baglanti);
            }
            if (degerFiltre == "Firma_Adı")
            {
                adtr = new OleDbDataAdapter("select * from ogrenciler where Durumu='" + durumm + "' and  Firma_Adı like '%" + textBoxAnaEkran.Text + "%'", baglanti);
            }

            table = new DataTable();
            adtr.Fill(table);
            dataGridView1.DataSource = table;
            dataGridView1.Refresh();
            int tabloToplami = dataGridView1.RowCount - 1;
            dataGridView1.Visible = true;
            if (dataGridView1.RowCount - 1==0)
            {
                label2.ForeColor = Color.WhiteSmoke;
                label2.Text = "Hiç kayıt bulunamadı";
            }
            else
            {
                label2.ForeColor = Color.DarkBlue;
                label2.Text = "Kayıtlı öğrenci sayısı: " + tabloToplami + "";
            }
            

        }
        public void filtreDeger()
        {
            if (filtre == "Öğrenci Numarasına")
            {
                filtre = "ogrenciNo";
            }
            if (filtre == "Ada")
            {
                filtre = "Ad";
            }
            if (filtre == "Soyada")
            {
                filtre = "Soyad";
            }
            if (filtre == "Firma_Adına")
            {
                filtre = "Firma_Adı";
            }
            if (filtre == "Firma_Alanına")
            {
                filtre = "Firma_Alanı";
            }
        }
        private void radioButton2_CheckedChanged(object sender, EventArgs e)
        {
            if (radioButton2.Checked == true)
            {
                filtreDeger();
                stajdurum = "Yapmadı";
                FiltrelemeDetay(filtre, stajdurum);
               
            }
        }

        private void radioButton3_CheckedChanged(object sender, EventArgs e)
        {

            if (radioButton3.Checked == true)
            {
                filtreDeger();
                stajdurum = "Devam Ediyor";
                FiltrelemeDetay(filtre, stajdurum);



            }
        }

        private void btnMark_Click(object sender, EventArgs e)
        {
            radioButton1.Checked = false;
            radioButton2.Checked = false;
            radioButton3.Checked = false;
            yenile();
            textBoxAnaEkran.Text = "";
            comboAnaEkran.Text = "Öğrenci Numarasına";


            dataGridView1.Refresh();
            int tabloToplami = dataGridView1.RowCount - 1;
            dataGridView1.Visible = true;
            label2.Text = "Kayıtlı öğrenci sayısı: " + tabloToplami + "";
        }

        private void comboAnaEkran_SelectedIndexChanged(object sender, EventArgs e)
        {
            filtre = comboAnaEkran.Text;
            filtreDeger();
        }

        string stajdurum;
        private void radioButton1_CheckedChanged(object sender, EventArgs e)
        {
            if (radioButton1.Checked==true)
            {
                filtreDeger();
                stajdurum = "Tamamladı";
                FiltrelemeDetay(filtre, stajdurum);
            }
           
        }

        public double gonderNot;

        private void textBoxAnaEkran_TextChanged(object sender, EventArgs e)
        {
            try
            {
                try
                {
                     
                    baglanti.Open();
                    if (comboAnaEkran.Text == "Öğrenci Numarasına")
                    {
                        adtr = new OleDbDataAdapter("select * from ogrenciler where ogrenciNo like '%" + textBoxAnaEkran.Text.ToUpper() + "%'", baglanti);
                        table = new DataTable();
                        adtr.Fill(table);
                        dataGridView1.DataSource = table;
                    }
                    if (comboAnaEkran.Text == "Ada")
                    {
                        adtr = new OleDbDataAdapter("select * from ogrenciler where Ad like '%" + textBoxAnaEkran.Text.ToUpper() + "%'", baglanti);
                        table = new DataTable();
                        adtr.Fill(table);
                        dataGridView1.DataSource = table;
                    }
                    if (comboAnaEkran.Text == "Soyada")
                    {
                        adtr = new OleDbDataAdapter("select * from ogrenciler where Soyad like '%" + textBoxAnaEkran.Text.ToUpper() + "%'", baglanti);
                        table = new DataTable();
                        adtr.Fill(table);
                        dataGridView1.DataSource = table;
                    }
                    if (comboAnaEkran.Text == "Firma_Adına")
                    {
                        adtr = new OleDbDataAdapter("select * from ogrenciler where Firma_Adı like '%" + textBoxAnaEkran.Text + "%'", baglanti);
                        table = new DataTable();
                        adtr.Fill(table);
                        dataGridView1.DataSource = table;
                    }
                    if (comboAnaEkran.Text == "Firma_Alanına")
                    {
                        adtr = new OleDbDataAdapter("select * from ogrenciler where Firma_Alanı like '%" + textBoxAnaEkran.Text.ToLower() + "%'", baglanti);
                        table = new DataTable();
                        adtr.Fill(table);
                        dataGridView1.DataSource = table;
                    }

                    //  komut = new OleDbCommand("select * from ogrenciler where ogrenciNo like '%" + textBox1.Text + "'%", baglanti);

                    label9.Text = "İlgili kayıt getirildi";
                    if (textBoxAnaEkran.Text == "")
                    {
                        label9.Text = "";
                    }
                    baglanti.Close();
                }
                catch (Exception)
                {
                    textBoxAnaEkran.Text = "";
                    textBoxAnaEkran.Focus();
                    MessageBox.Show("Geçersiz veri girişi yapıldı! ","Geçersiz giriş",MessageBoxButtons.OK,MessageBoxIcon.Information);
                    baglanti.Close();
                    yenile();
                  

                    



                }
              


            }
            catch (Exception r)
            {

                MessageBox.Show(r.ToString());
            }



        }

        private void btnDuzen_Click(object sender, EventArgs e)
        {
            frmOgrenciSil frm = new frmOgrenciSil();
            frm.label9.Text = "" + gonderAd + " adlı öğrencinin verileri getirildi!";
            frm.textBox1.Text = gonderNo;
            frm.textBox2.Text = gonderAd;
            frm.textBox3.Text = gonderSoyad;
            frm.textBox4.Text = gonderFirma;
            frm.textBox5.Text = gonderNot.ToString();
            frm.comboBox1.Text = gonderAlan;
            frm.dateTimePicker1.Text = gonderTarih.ToString();
            frm.ShowDialog();
            
        }

        
        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            try
            {
                if (dataGridView1.Rows[e.RowIndex].Cells["ogrenciNo"].Value.ToString() == "")
                {
                    label9.Text = "";
                
                }
                else
                {
                    gonderNo = dataGridView1.Rows[e.RowIndex].Cells["ogrenciNo"].Value.ToString();
                    gonderAd = dataGridView1.Rows[e.RowIndex].Cells["Ad"].Value.ToString();
                    gonderSoyad = dataGridView1.Rows[e.RowIndex].Cells["Soyad"].Value.ToString();
                    gonderFirma = dataGridView1.Rows[e.RowIndex].Cells["Firma_Adı"].Value.ToString();
                    gonderNot = Convert.ToDouble(dataGridView1.Rows[e.RowIndex].Cells["Basari_Notu"].Value.ToString());
                    gonderAlan = dataGridView1.Rows[e.RowIndex].Cells["Firma_Alanı"].Value.ToString();
                    gonderTarih = dataGridView1.Rows[e.RowIndex].Cells["Staj_Baslangic"].Value.ToString();
                    gonderTarihBitis = dataGridView1.Rows[e.RowIndex].Cells["Staj_Bitis"].Value.ToString();


                }

            }
            catch
            { }
        }
    }
}
