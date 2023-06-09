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
    public partial class frmGiris : Form
    {
        public frmGiris()
        {
            InitializeComponent();
        }

        OleDbConnection baglanti = new OleDbConnection("Provider=Microsoft.ACE.OLEDB.12.0;Data Source=" + Application.StartupPath.ToString() + "\\veritabanidb.accdb");
        DataSet dtst = new DataSet();
        OleDbDataAdapter adtr = new OleDbDataAdapter();
        OleDbCommand komut;
        OleDbDataReader dr;

        Form frmOgrenci = new Form();

        /* OleDbConnection baglanti = new OleDbConnection("Provider=Microsoft.ACE.OLEDB.12.0;Data Source=veritabanidb.accdb");
       OleDbCommand komut;
       OleDbDataAdapter da;
       OleDbDataReader dr;
       DataSet ds = new DataSet();
       */


        /* try
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
                 dataGridView1.Columns[0].Width = 150;
                 dataGridView1.Columns[1].Width = 150;
                 dataGridView1.Columns[2].Width = 150;
                 baglanti.Close();
             }
             catch (Exception r)
             {

                 MessageBox.Show(r.ToString());
             }
             */

         private void Form1_Load(object sender, EventArgs e)
         {
            textBox2.PasswordChar = '*';
           textBox2.MaxLength = 20;
           textBox1.MaxLength = 20;

            pictureBox1.Visible = false;
            pictureBox2.Visible = false;

            pictureBox3.Visible = false;
            pictureBox4.Visible = false;


        }

         private void button1_Click(object sender, EventArgs e)
         {


         }

         private void button2_Click(object sender, EventArgs e)
         {


         }

         private void button3_Click(object sender, EventArgs e)
         {

         }

        private void button1_Click_1(object sender, EventArgs e)
        {
            baglanti.Open();
            if (textBox1.Text == "" || textBox2.Text == "") 
            {
                label3.Text = "Boş Bırakmayın";
            }
            else
            {
                stajyer_takip_uygulamasi.Kullanici.kadi = textBox1.Text;
                stajyer_takip_uygulamasi.Kullanici.sifree = textBox2.Text;
                komut = new OleDbCommand("select * from yetki where k_adi='" + textBox1.Text + "' and k_sifre='" + textBox2.Text + "'", baglanti);
                komut.ExecuteNonQuery();
                dr = komut.ExecuteReader();
                if (dr.Read())
                {
                    frmAnaEkran frm = new frmAnaEkran();

                   if (dr["k_yetki"].ToString() == "yönetici")
                    {
                        frm.btnGuncelle.Enabled = true;
                        frm.lblUyari.Text = "Hoşgeldin " +dr["k_adi"].ToString()+"!";
                    }
                   else
                    {
                        frm.comboAnaEkran.Enabled = false;
                        frm.textBoxAnaEkran.Enabled = false;
                        frm.btnGuncelle.Enabled = true;
                        frm.button1.Enabled = false;
                        frm.button2.Enabled = false;
                        frm.lblUyari2.Text = "Tüm üye işlemlerine erişebilmek için, yönetici olarak giriş yapınız";
                        frm.lblUyari2.ForeColor = Color.Red;
                    }
                    
                    frm.ShowDialog();
                }
                else
                {
                    label3.Text = "Kullanıcı adı veya şifre yanlış!!";
                }
            }
            baglanti.Close();
            textBox1.Clear();
            textBox2.Clear();
            textBox1.Focus();
        }

        private void frmGiris_FormClosed(object sender, FormClosedEventArgs e)
        {
            DialogResult secenek = MessageBox.Show("Çıkmak İstediğinize Emin Misiniz?", "ÇIKIŞ YAPILIYOR!", MessageBoxButtons.YesNo, MessageBoxIcon.Question);
            if (secenek == DialogResult.Yes)
            {
                Application.Exit();
            }
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {
            if (textBox1.Text.Length<3)
            {
                pictureBox2.Visible = true;
            }
            else
            {
                pictureBox2.Visible = false;
                pictureBox1.Visible = true;
            }
        }

        private void textBox2_TextChanged(object sender, EventArgs e)
        {
            if (textBox2.Text.Length < 3)
            {
                pictureBox3.Visible = true;
            }
            else
            {
                pictureBox3.Visible = false;
                pictureBox4.Visible = true;
            }
        }
    }
 }
