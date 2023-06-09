using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.OleDb;
using System.Drawing;
using System.Linq;
using System.IO;
using System.Text;
using System.Windows.Forms;
using System.Drawing.Drawing2D;

namespace videoplayer_burak_kizilkaya
{
    public partial class videoOynat : Form
    {

        OleDbConnection baglanti = new OleDbConnection("Provider=Microsoft.ACE.OLEDB.12.0;Data Source=videoplayer.accdb"); //bağlantı satırım.
        OleDbCommand komut;
        string aciklama, dosyayol,veriyolu,baslik,turu,id;
        //parametreden gelecek verileri almak için form içinde tuttuğum değişkenler.


        void temizle()//temizle metodum. 
        {
            richTextBox1.Clear();
            txtBaslik.Clear();
            txtDosya.Clear();
            txtTur.Clear();
            txtVeri.Clear();

        }

        private void button1_Click(object sender, EventArgs e) //Silme butonuna tıklandığında.
        {
            try
            {
                DialogResult dlg = new DialogResult();
                dlg = MessageBox.Show("Bu videoyu silmek üzeresiniz, devam etmek istiyor musunuz?", "Uyarı", MessageBoxButtons.YesNo,MessageBoxIcon.Question);
                if (dlg==DialogResult.Yes) //Silmek istediğime eminim işaretlendiğinde.
                {
                    baglanti.Open(); //bağlantı açıyorum.
                    komut = new OleDbCommand("delete from video where video_id="+id+"", baglanti); //parametreden gelen id ye göre silme işlemi yapıyor.
                    int sonuc= komut.ExecuteNonQuery();
                    //integer değer döndüren ExecuteNonQuery fonksiyonu
                    //true dönerse sonuc değiskenim 1, false dönerse -1 olacak.
                    if (sonuc>0) //true döndüğünde.
                    {
                        temizle(); //temizle metodu
                        File.Delete(@"videolar\" + dosyayol.ToString()); //silme işlemi.
                        axWindowsMediaPlayer1.Ctlcontrols.stop(); //Videoyu durduruyorum.
                        MessageBox.Show("Video silindi!", "Bilgi", MessageBoxButtons.OK, MessageBoxIcon.Information);//Mesaj veriyorum.
                    }
                    else //false döndüğünde
                    {
                        MessageBox.Show("Hata! Video silinemedi");
                    }
                    baglanti.Close();
                }
            }
            catch (Exception r )
            {
                MessageBox.Show("Hata! : "+r.ToString());
            }
        }

        public videoOynat(string _dosyayol,string _aciklama,string _baslik, string _veriyolu, string _turu, string _id) //parametre
        {
            InitializeComponent();
            //parametrelerden gelen veriler form içindeki değişkenlere aktarılıyor.
            dosyayol = _dosyayol; 
            aciklama = _aciklama;
            veriyolu = _veriyolu;
            id = _id;
            baslik = _baslik;
            turu = _turu;
        }

        private void set_background(Object sender, PaintEventArgs e) //gradient uyguladığım metod
        {
            Graphics graphics = e.Graphics;
            
            Rectangle gradient_rectangle = new Rectangle(0, 0, Width, Height);
            Brush b = new LinearGradientBrush(gradient_rectangle, Color.FromArgb(220, 220, 220), Color.FromArgb(0, 104, 139), 70f);
            graphics.FillRectangle(b, gradient_rectangle);
        }

        private void videoOynat_Load(object sender, EventArgs e) //videoOynat formu ilk yüklendiğinde.
        {
            this.Paint += new PaintEventHandler(set_background); //metoda göre formu boyama işlemi yapıyorum. Gözle görülmeyen bir hızda yapıyor.
            try
            {
                richTextBox1.ReadOnly = true; //Açıklama metin kutusunu sadece okunabilir ilan ediyorum.
                richTextBox1.Text = aciklama; //Metin kutusuna parametreden aldığım açıklama verisi aktarılır.
                txtDosya.Text = dosyayol.ToString(); //Dosya adına parametreden gelen veri aktarılır.
                txtBaslik.Text = baslik.ToString(); //Başlık bilgisini yine parametreden alıyorum.
                txtTur.Text = turu.ToString(); //Tür bilgisi parametreden geliyor.
                txtVeri.Text = veriyolu.ToString(); //Veriyolu da parametreden geliyor.
                axWindowsMediaPlayer1.URL = @"videolar\" + dosyayol.ToString();
                //axWindowsMediaPlayer1 nesnemin URL özelliğine:
                //videolar klasöründen adı şu olan video oynat emri veriyorum.
                //İlk açılış olduğu için seçilmiş ve parametre değişkenlerim sayesinde gönderilmiş video
                //burada ismiyle birlikte çağırılıyor.

                //butonlarım pasif hale getiriliyor.
                txtBaslik.Enabled = false; 
                txtTur.Enabled = false;
                txtDosya.Enabled = false;
                txtVeri.Enabled = false;
            }
            catch (Exception) //hata yakalandığında.
            {

                MessageBox.Show("Hatalı işlem!", "Uyarı", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
        private void videoOynat_FormClosed(object sender, FormClosedEventArgs e) //form kapandığında
        {
           axWindowsMediaPlayer1.URL = ""; //URL özelliğini boş bırakıyorum.
           Update(); //c# update metodu.
        }
    }
}
