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
    public partial class frmOgrenciEkle : Form
    {
        public frmOgrenciEkle()
        {
            InitializeComponent();
        }
        OleDbConnection baglanti = new OleDbConnection("Provider=Microsoft.ACE.OLEDB.12.0;Data Source=" + Application.StartupPath.ToString() + "\\veritabanidb.accdb");
        DataSet dtst = new DataSet();
        OleDbDataAdapter adtr = new OleDbDataAdapter();
        //OleDbCommand komut;
      //  OleDbDataReader dr;

        private void btnTopluKayit_Click(object sender, EventArgs e)
        {
            frmKayiExcel frm = new frmKayiExcel();
            frm.ShowDialog();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (textBox1.Text == "" || textBox2.Text == "" || textBox3.Text == "" || textBox4.Text == "" || comboBox1.Text == "" || dateTimePicker1.Text == "" || maskedTextBox1.Text=="")
                MessageBox.Show("İlgili Alanları Doldurun");
            else
            {
              //  try
          //      {

                    double basarinotu;
                    string deger4 ="";
                    string deger3 ="";
                    string deger2 = "";
                    string deger1 = "";
                    string newtext = "";
                    string basarinotutext = maskedTextBox1.Text;         //3.14
                    string yenitext= basarinotutext.Replace(".", ",").ToString(); //nokta varsa virgül yapar
             /*       if (basarinotutext.Length == 4 && basarinotutext[1] != ',' || basarinotutext.Length == 4 && basarinotutext[1] != '.') //4 karakver ve VİRGÜL yoksa uyarı verir
                    {
                        MessageBox.Show("Lütfen nokta/virgül kullanınız!", "UYARI", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    }*/

                     if (basarinotutext[1] != ',')//virgül girilmediyse içeri girer
                    {
                        deger4 = basarinotutext[2].ToString();
                        deger3 = basarinotutext[1].ToString();
                        deger2 = ",";
                        deger1 = basarinotutext[0].ToString();
                        newtext = "" + deger1 + "" + deger2 + "" + deger3 + "" + deger4 + "";
                        basarinotu = Convert.ToDouble(newtext.ToString());         //314
                    }

                  
                        basarinotu = Convert.ToDouble(yenitext.ToString());
                    
                             
                  

                    String substring = dateTimePicker1.Value.ToString().Substring(0, 10);
                String substringBitis = dateTimePicker2.Value.ToString().Substring(0, 10);
                    baglanti.Open();
                string devam = "Devam Ediyor";
                    OleDbCommand komut = new OleDbCommand("insert into ogrenciler(ogrenciNo,Ad,Soyad,Firma_Adı,Firma_Alanı,Staj_Baslangic,Staj_Bitis,Basari_Notu,Durumu) values ('" + textBox1.Text.ToUpper() + "','" + textBox2.Text.ToString().ToUpper() + "','" + textBox3.Text.ToString().ToUpper() + "','" + textBox4.Text.ToString() + "','" + comboBox1.Text.ToString() + "','" + substring + "','"+ substringBitis + "','" + basarinotu + "','"+devam+"')", baglanti);
                    komut.ExecuteNonQuery();
                    komut.Dispose();
                    baglanti.Close();
                    MessageBox.Show("" + textBox2.Text + " adlı öğrenci başarıyla eklenmiştir!");
                    textBox1.Clear();
                    textBox2.Clear();
                    textBox3.Clear();
                    textBox4.Clear();
                    maskedTextBox1.Clear();
                    dateTimePicker1.Text = "";
                    comboBox1.Text = "";
                    textBox1.Focus();
             //   }
            //    catch (Exception r)
           //     {
               //     MessageBox.Show(r.ToString());
               //     MessageBox.Show("Lütfen veri girişinizi kontrol ediniz!", "UYARI", MessageBoxButtons.OK, MessageBoxIcon.Information);
            //    }

            }
    }

        private void frmOgrenciEkle_Load(object sender, EventArgs e)
        {
            maskedTextBox1.MaxLength = 4;
            DateTime StajGunEkle = dateTimePicker1.Value.AddDays(+42);

            dateTimePicker2.Value = StajGunEkle;
            dateTimePicker2.Enabled = false;


        }

        private void dateTimePicker1_ValueChanged(object sender, EventArgs e)
        {
            DateTime StajGunEkle = dateTimePicker1.Value.AddDays(+42);

            dateTimePicker2.Value = StajGunEkle;



        }

        private void checkBox1_CheckedChanged(object sender, EventArgs e)
        {
            if (checkBox1.Checked == true)
            {
                dateTimePicker2.Enabled = true;
            }
            else
            {
                dateTimePicker2.Enabled = false;
                DateTime StajGunEkle = dateTimePicker1.Value.AddDays(+42);

                dateTimePicker2.Value = StajGunEkle;

            }
        }
    }
    }
