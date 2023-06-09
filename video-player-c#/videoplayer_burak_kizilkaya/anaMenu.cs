using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.OleDb;  //access veritabanı bağlantısı için
using System.IO; //Veri yolunu, ve videoyu kopyalamak için gerekli.
using System.Drawing.Drawing2D; //gradient için


namespace videoplayer_burak_kizilkaya
{
    public partial class anaMenu : Form
    {
        public anaMenu()
        {
            InitializeComponent();
        }
        OleDbConnection baglanti = new OleDbConnection("Provider=Microsoft.ACE.OLEDB.12.0;Data Source=videoplayer.accdb"); //veritabani bağlantısı
        DataSet ds = new DataSet();
        OleDbCommand komut;
        int kayitSorgu; //sonradan kullanılacak.

        public void set_background(Object sender, PaintEventArgs e) //gradient uyguladığım metod
        {
            Graphics graphics = e.Graphics;
            Rectangle gradient_rectangle = new Rectangle(0, 0, Width, Height); //0,0 ile ekran büyüklüğünde bir gradient_rectangle oluşturuyorum.
            Brush b = new LinearGradientBrush(gradient_rectangle, Color.FromArgb(243, 243, 243), Color.FromArgb(0, 104, 139), 70f);    //rgb değerlerini b nesneme aktarıyorum.  
            graphics.FillRectangle(b, gradient_rectangle);  //Oluşturulan rectangle, yani dikdörtgen b içerisindeki rgb değerleri ile dolduruluyor.
        }

        public void dataGridYaz()
        {
            try
            {
                    label6.Text = ""; // Görünmez bir label.
                    dataGridView1.Visible = true; //Görünürlüğü aktifleştirir
                    dataGridView1.Columns.Clear(); //Sütunları temizler
                    ds.Tables.Clear(); //Tablo temizleniyor.
                    dataGridView1.Refresh(); //Tablo yenileniyor.
                    baglanti.Open(); //Baglantı açılıyor
                    OleDbDataAdapter adtr = new OleDbDataAdapter("select * From video", baglanti); 
                    adtr.Fill(ds, "video");
                    dataGridView1.DataSource = ds.Tables[0]; //datagridview ilk tablo ile dolduruluyor
                    dataGridView1.Columns[0].HeaderText = "Video ID";
                    dataGridView1.Columns[1].HeaderText = "Video Başlığı";
                    dataGridView1.Columns[2].HeaderText = "Video Açıklaması";
                    dataGridView1.Columns[3].HeaderText = "Video Türü";
                    dataGridView1.Columns[4].HeaderText = "Dosya Adı";
                    dataGridView1.Columns[5].HeaderText = "Video Veri Yolu"; //sütunlara isim. 
                    dataGridView1.Columns[0].Width = 50; //sütunların genişliği.
                    dataGridView1.Columns[1].Width = 133;
                    dataGridView1.Columns[2].Width = 130;
                    dataGridView1.Columns[3].Width = 120;
                    dataGridView1.Columns[4].Width = 235;
                    dataGridView1.Columns[5].Width = 255;
                    baglanti.Close(); //bağlantı kapatılıyor.
                
            }
            catch (Exception r)
            {

                MessageBox.Show("Hata! Alınan hata : "+r.ToString()); //hata ile karşılaşılırsa.
            }
        }
        private void button1_Click(object sender, EventArgs e) //yükle butonuna tıklandığında
        {
            Form1 frm = new Form1(); 
            frm.Show (); //Form1 i açıyor.   
        }
        string aciklama, dosyaadi,baslik,turu,veriyolu;
        string id;

      

        private void button2_Click(object sender, EventArgs e) // Seçili videoyu oynat butonuna tıklandığında.
        {
            try
            {
                if (dataGridView1.DataSource!=null) //Datagridview'da veri varsa 
                {
                    videoOynat frm = new videoOynat(dosyaadi, aciklama, baslik, veriyolu, turu, id);
                    //videoOynat formuna parametreyle veri yolluyor.
                    //Bu değişkenler CellClick olayında, yani datagridview'de seçim olduğunda değer alıyor.
                    frm.Show(); 
                }
                else
                {
                    MessageBox.Show("Veritabanında video yok!", "Hatalı seçim", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                }

            }
            catch (Exception)
            {

                throw;
            }
           
         //   this.Hide();
        }

       
        private void anaMenu_Load(object sender, EventArgs e) //Anamenü yüklendiğinde
        {
            this.Paint += new PaintEventHandler(set_background); //Bu formu boya emri veriyorum. set_background metodunu çalıştırıyorum.
            Color c1 = Color.FromArgb(10, 90, 120); //Datagridview için kullanacağım rgb renk değerlerini c1 değişkenimde tutuyorum.
            dataGridView1.BackgroundColor = c1; //Datagridviewin arkaplanını c1deki rgb renk değerlerine göre ayarlıyor.
            try
            {
                dataGridYaz(); //datagridyaz metodu çalıştırılır.
                kayitSorgu = dataGridView1.RowCount; //kayitSorgu değişkenine datagridviewdeki satır sayısı bilgisi aktarılır.
                if (kayitSorgu <= 0) //satır yoksa, yani tabloda veri yoksa uyarır.
                {
                    label6.Text = "Veritabanına kayıtlı video bulunamadı...";
                }
                else //tabloda veri varsa form ilk yüklendiğinde parametre değişkenlerime ilk kaydın bilgilerini yolluyorum.
            {
                aciklama = dataGridView1.Rows[0].Cells["video_aciklama"].Value.ToString();
                dosyaadi = dataGridView1.Rows[0].Cells["video_dosya_adi"].Value.ToString();
                turu = dataGridView1.Rows[0].Cells["video_turu"].Value.ToString();
                veriyolu = dataGridView1.Rows[0].Cells["video_veriyolu"].Value.ToString();
                baslik = dataGridView1.Rows[0].Cells["video_ad"].Value.ToString();
                id = dataGridView1.Rows[0].Cells["video_id"].Value.ToString();
            }
                   
                
                    
            }
            catch (Exception r )
            { 
                MessageBox.Show(r.ToString());
            }
        }
        private void anaMenu_FormClosed(object sender, FormClosedEventArgs e) //anaform kapandığında
        {
            Application.Exit(); //uygulamanın debugını durdurur.
        }

        private void button3_Click(object sender, EventArgs e) //yenile butonu.
        {
            dataGridYaz();
        }

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e) //datagridview'de bir kayıt seçildiğinde
        {
            try 
            {
                //videoOynat formuna yollayacağım parametre değişkenlerime seçili kaydın bilgilerini aktarır.
                aciklama = dataGridView1.Rows[e.RowIndex].Cells["video_aciklama"].Value.ToString();
                dosyaadi = dataGridView1.Rows[e.RowIndex].Cells["video_dosya_adi"].Value.ToString();
                turu = dataGridView1.Rows[e.RowIndex].Cells["video_turu"].Value.ToString();
                veriyolu = dataGridView1.Rows[e.RowIndex].Cells["video_veriyolu"].Value.ToString();
                baslik = dataGridView1.Rows[e.RowIndex].Cells["video_ad"].Value.ToString();
                id = dataGridView1.Rows[e.RowIndex].Cells["video_id"].Value.ToString();
            }
            catch (Exception )
            {
                MessageBox.Show("Lütfen geçerli bir satır seçiniz!","Hatalı seçim",MessageBoxButtons.OK,MessageBoxIcon.Error);
            }
        }
    }
}
