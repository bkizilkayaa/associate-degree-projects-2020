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
    public partial class frmKayiExcel : Form
    {
        public frmKayiExcel()
        {
            InitializeComponent();
        }
        OleDbConnection baglanti = new OleDbConnection("Provider=Microsoft.ACE.OLEDB.12.0;Data Source=" + Application.StartupPath.ToString() + "\\veritabanidb.accdb");
        DataSet dtst = new DataSet();
        OleDbDataAdapter adtr = new OleDbDataAdapter();
       // OleDbCommand komut;
       // OleDbDataReader dr;

        string DosyaYolu;

        public string KayitKontrol(string ogrenciNo)  //  aktif edilirse tüm kayıtlar eklenirken var mı diye kontrol edilir
        {
            string Durum = "";
            try
            {
                OleDbCommand komut = new OleDbCommand();
                baglanti = new OleDbConnection();
                baglanti.ConnectionString = "Provider = Microsoft.ACE.OLEDB.12.0; Data Source = " + Application.StartupPath.ToString() + "\\veritabanidb.accdb";
                baglanti.Open();
                komut = new OleDbCommand("select count(Ad) from ogrenciler where ogrenciNo='" + ogrenciNo + "'", baglanti);
                komut.ExecuteNonQuery();
                var Sonuc = komut.ExecuteScalar();
                if (Convert.ToInt32(Sonuc) > 0)
                {
                    Durum = "Var";
                }
                else
                {
                    Durum = "Yok";
                }
                baglanti.Close();
            }
            catch (Exception ex)
            {

                MessageBox.Show(ex.Message);
            }
            return Durum;
        }











        public void DbyeAktar(string ogrenciNo, string Ad, string Soyad, string Firma_Adı, string Firma_Alanı, string Staj_Baslangic, string Staj_Bitis, double Basari_Notu, string Durumu)
        {
            try
            {
                
                String substring = Staj_Baslangic.ToString().Substring(0, 10);
                baglanti = new OleDbConnection();
                baglanti.ConnectionString = "Provider = Microsoft.ACE.OLEDB.12.0; Data Source = " + Application.StartupPath.ToString() + "\\veritabanidb.accdb";
                baglanti.Open();
                OleDbCommand komut = new OleDbCommand();
                komut = new OleDbCommand("insert into ogrenciler(ogrenciNo,Ad,Soyad,Firma_Adı,Firma_Alanı,Staj_Baslangic,Staj_Bitis,Basari_Notu,Durumu) values ('" + ogrenciNo.ToString() + "','" + Ad.ToString() + "','" + Soyad.ToString() + "','" + Firma_Adı.ToString() + "','" + Firma_Alanı.ToString() + "','" + substring + "','"+Staj_Bitis+"','"+Basari_Notu + "','"+Durumu+"')", baglanti);
                komut.ExecuteNonQuery();
                komut.Dispose();
                baglanti.Close();
            }
            catch (Exception ex)
            {

                MessageBox.Show(ex.Message);
            }
        }

    

        public void GrideAktar()
        {
            try
            {
                string Sorgu = "SELECT * FROM [Sayfa1$]";
                OleDbConnection conn = new OleDbConnection();
                conn.ConnectionString = @"Provider=Microsoft.ACE.OLEDB.12.0;Data Source=" + DosyaYolu + ";Extended Properties=" + "\"Excel 12.0 Xml;HDR=YES;IMEX=1\"";
                OleDbDataAdapter adapter = new OleDbDataAdapter(Sorgu, conn);
                DataTable tbl = new DataTable();
                adapter.Fill(tbl);
                dataGridView1.DataSource = tbl;
            }
            catch (Exception ex)
            {


                MessageBox.Show(ex.Message);
            }
        }


        private void btnExcel_Click(object sender, EventArgs e)
        {
            OpenFileDialog file = new OpenFileDialog();
            file.Filter = "Excel Dosyası |*.xls| Excel Dosyası|*.xlsx";
            file.FilterIndex = 2;
            file.RestoreDirectory = true;
            file.CheckFileExists = false;
            file.Title = "Excel Dosyası Seçiniz..";

            if (file.ShowDialog() == DialogResult.OK)
            {
                DosyaYolu = file.FileName;
                label1.Text = "KONUM : " + DosyaYolu;
                GrideAktar();
            }
        }

        private void btnKayitTamam_Click(object sender, EventArgs e)
        {
            string ogrenciNo, Ad, Soyad, Firma_Adı, Firma_Alanı, Staj_Baslangic,Staj_Bitis,Durumu;
            double Basari_Notu;
            if (dataGridView1.RowCount==0)
            {
                MessageBox.Show("Veri girişi sağlanmadı. Lütfen veri ekleyiniz");
            }
            else
            {
                for (int i = 0; i < dataGridView1.RowCount - 1; i++)
                {
                    ogrenciNo = dataGridView1.Rows[i].Cells[0].Value.ToString();
                    Ad = dataGridView1.Rows[i].Cells[1].Value.ToString();
                    Soyad = dataGridView1.Rows[i].Cells[2].Value.ToString();
                    Firma_Adı = dataGridView1.Rows[i].Cells[3].Value.ToString();
                    Firma_Alanı = dataGridView1.Rows[i].Cells[4].Value.ToString();
                    Staj_Baslangic = dataGridView1.Rows[i].Cells[5].Value.ToString();
                    Staj_Bitis = dataGridView1.Rows[i].Cells[6].Value.ToString();
                    Basari_Notu = double.Parse(dataGridView1.Rows[i].Cells[7].Value.ToString());
                    Durumu= dataGridView1.Rows[i].Cells[8].Value.ToString();
                    string Kontrol = KayitKontrol(ogrenciNo);
                    if (Kontrol == "Yok") // aktif edilirse aynı olan numaraları eklemez 
                    {
                        DbyeAktar(ogrenciNo, Ad, Soyad, Firma_Adı, Firma_Alanı, Staj_Baslangic, Staj_Bitis,Basari_Notu,Durumu);
                    }
                    else if (Kontrol == "Var")
                    {
                        MessageBox.Show("" + Ad + " adlı öğrenci zaten kayıtlı!", "Uyarı", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }

                }
                MessageBox.Show("Kayıt Tamamlandı");
            }
           
        }
    }
}
