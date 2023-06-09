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
    public partial class frmOgrenciSil : Form
    {
        public frmOgrenciSil()
        {
            InitializeComponent();
        }
        public void datayenile()
        {

            try
            {
                dataGridView1.Visible = true;
                dataGridView1.Columns.Clear();
                dtst.Tables.Clear();
                dataGridView1.Refresh();
                baglanti.Open();
                OleDbDataAdapter adtr = new OleDbDataAdapter("select * From ogrenciler", baglanti);
                adtr.Fill(dtst, "ogrenciler");
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
                dataGridView1.Columns[6].Width = 92;
                dataGridView1.Columns[7].Width = 92;
                dataGridView1.Columns[8].Width = 82;
                int tabloToplami = dataGridView1.RowCount - 1;
                label12.Text = "Kayıtlı öğrenci sayısı: " + tabloToplami + "";
                baglanti.Close();
            }
            catch (Exception r)
            {

                MessageBox.Show(r.ToString());
            }


        }
        public void temizle()
        {
            textBox1.Clear();
            textBox2.Clear();
            textBox3.Clear();
            textBox4.Clear();
            textBox5.Clear();
            comboBox1.Text = "";
            dateTimePicker1.Text = "";
            textBox1.Focus();
            dateTimePicker2.Text = "";

        }
        OleDbConnection baglanti = new OleDbConnection("Provider=Microsoft.ACE.OLEDB.12.0;Data Source=" + Application.StartupPath.ToString() + "\\veritabanidb.accdb");
        DataSet dtst = new DataSet();
        OleDbDataAdapter adtr = new OleDbDataAdapter();
        OleDbCommand komut;
        OleDbDataReader dr;
        
        private void frmOgrenciSil_Load(object sender, EventArgs e)
        {
            try
            {
                dateTimePicker2.Enabled = false;
                textBox1.Enabled = false;
                button3.Visible = false;
                datayenile();

                Form frm = new frmGiris();
             








                int tabloToplami = dataGridView1.RowCount - 1;
                label12.Text="Kayıtlı öğrenci sayısı: "+ tabloToplami + "";
                //  textBox1.Enabled = false;

                //    textBox2.Enabled = false;
                // textBox3.Enabled = false;
                // textBox4.Enabled = false;
                // comboBox1.Enabled = false;
                textBox5.Enabled = false; //başarı notu pasif
                    // maskedTextBox1.Enabled = false;
                }
            catch (Exception r)
            {

                MessageBox.Show(r.ToString());
            }
        }

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            try
            {
                if (dataGridView1.Rows[e.RowIndex].Cells["ogrenciNo"].Value.ToString()=="")
                {
                    label9.Text = "";
                    temizle();
                }
                else
                {
                    textBox1.Text = dataGridView1.Rows[e.RowIndex].Cells["ogrenciNo"].Value.ToString();
                    textBox2.Text = dataGridView1.Rows[e.RowIndex].Cells["Ad"].Value.ToString();
                    textBox3.Text = dataGridView1.Rows[e.RowIndex].Cells["Soyad"].Value.ToString();
                    textBox4.Text = dataGridView1.Rows[e.RowIndex].Cells["Firma_Adı"].Value.ToString();
                    textBox5.Text = dataGridView1.Rows[e.RowIndex].Cells["Basari_Notu"].Value.ToString();
                    comboBox1.Text = dataGridView1.Rows[e.RowIndex].Cells["Firma_Alanı"].Value.ToString();
                    dateTimePicker1.Text = dataGridView1.Rows[e.RowIndex].Cells["Staj_Baslangic"].Value.ToString();
                    dateTimePicker2.Text = dataGridView1.Rows[e.RowIndex].Cells["Staj_Bitis"].Value.ToString();
                    label9.Text = "" + textBox2.Text + " adlı öğrencinin bilgileri getirildi.";
                }
                
            }
            catch
            { }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                if (textBox1.Text=="")
                {
                    MessageBox.Show("Öğrenci seçiniz","Öğrenci seçimi yapınız!",MessageBoxButtons.OK, MessageBoxIcon.Warning);

                }
                else
                {
                    DialogResult secenek = MessageBox.Show(""+textBox2.Text+" adlı öğrenciyi silmek üzeresiniz, onaylıyor musunuz?", "Onay", MessageBoxButtons.YesNo, MessageBoxIcon.Information);
                    if (secenek == DialogResult.Yes)
                    {
                        baglanti.Open();
                        OleDbCommand komut = new OleDbCommand("DELETE FROM ogrenciler WHERE ogrenciNo='" + textBox1.Text + "'", baglanti);
                        komut.ExecuteNonQuery();
                        komut.Dispose();
                        baglanti.Close();
                        MessageBox.Show("" + textBox2.Text + " adlı öğrenci başarıyla silinmiştir!", "Silme işlemi tamamlandı", MessageBoxButtons.OK, MessageBoxIcon.Information);
                        label9.Text = "Silme işlemi tamamlandı!";
                        datayenile();
                        textBox1.Clear();
                        textBox2.Clear();
                        textBox3.Clear();
                        textBox4.Clear();
                        comboBox1.Text = "";
                        dateTimePicker1.Text = "";
                        textBox5.Clear();
                        datayenile();
                        textBox1.Focus();
                    }
                    
                }
               
            }
            catch (Exception r)
            {
                MessageBox.Show(r.ToString());
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            try
            {
                String substring = dateTimePicker1.Text.ToString().Substring(0, 10);
                baglanti.Open();
                komut = new OleDbCommand("select * from ogrenciler where ogrenciNo='" + textBox1.Text.ToString() + "'", baglanti);
                dr = komut.ExecuteReader();
                if (dr.Read())
                {
                    komut =new OleDbCommand("UPDATE ogrenciler SET Ad = '" + textBox2.Text + "',Soyad = '" + textBox3.Text + "' ,Firma_Adı = '" + textBox4.Text + "' ,Firma_Alanı='"+comboBox1.Text+ "',Staj_Baslangic='"+ substring+ "',Basari_Notu='"+double.Parse(textBox5.Text)+"'  WHERE ogrenciNo = '" + textBox1.Text.ToString() + "'",baglanti);
                    komut.ExecuteNonQuery();
                    MessageBox.Show("" + textBox2.Text + " adlı öğrenci başarıyla güncellenmiştir!", "Güncelleme işlemi tamamlandı", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    label9.Text = ""+textBox2.Text +" adlı öğrenci başarıyla güncellendi!";

                    temizle();
                    baglanti.Close();
                    /*
                    komut = new OleDbCommand("update ogrenciler set Ad=" + textBox2.Text + ", Soyad=" + textBox3.Text + ", Firma_Adi=" + textBox4.Text + ", Firma_Alani='" + comboBox1.Text +"', Staj_Baslangic=" + maskedTextBox1.Text + ", where ogrenciNo= '"+ int.Parse(textBox1.Text) + "' ", baglanti);
                    komut.ExecuteNonQuery();
                    label9.Text = "GÜNCELLEME BAŞARILI";
                    baglanti.Close();*/

                }
                else
                {
                    label9.Text = "veri girişi yapınız!";
                    baglanti.Close();


                }
                datayenile();
                baglanti.Close();
            }
            catch (Exception r)
            {

                MessageBox.Show(r.ToString());
            }
        }

        private void textBox1_Click(object sender, EventArgs e)
        {
           
        }

        private void button3_Click(object sender, EventArgs e)
        {/*
            try
            {
                baglanti.Open();
                if (textBox1.Text == "")
                {
                    label9.Text = "Öğrenci Numarası Girin";
                }
                else
                {
                    komut = new OleDbCommand("select * from ogrenciler where ogrenciNo='" + textBox1.Text + "'", baglanti);
                    dr = komut.ExecuteReader();
                    if (dr.Read())
                    {
                        textBox1.Text = dr["ogrenciNo"].ToString();
                        textBox2.Text = dr["Ad"].ToString();
                        textBox3.Text = dr["Soyad"].ToString();
                        textBox4.Text = dr["Firma_Adı"].ToString();
                        textBox5.Text = dr["Basari_Notu"].ToString();
                        comboBox1.Text = dr["Firma_Alanı"].ToString();
                        dateTimePicker1.Text = dr["Staj_Baslangic"].ToString();
                        label9.Text = "" + textBox2.Text + " adlı öğrencinin bilgileri getirildi.";

                    }
                    else
                    {
                        temizle();
                        label9.Text = "Bu numarada bir öğrenci yok";
                    }
                }

                baglanti.Close();
            }
            catch (Exception ex)
            {

                MessageBox.Show(ex.Message);
            }*/
        }

        public void gunEklePicker2()
        {

            DateTime StajGunEkle = dateTimePicker1.Value.AddDays(+42);

            dateTimePicker2.Value = StajGunEkle;
        }
        private void dateTimePicker1_ValueChanged(object sender, EventArgs e)
        {
            gunEklePicker2();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            temizle();
            label9.Text = "";
            dataGridView1.Refresh();
             

          
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }
    }
    }

