using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.IO;
using System.Data.OleDb;
using System.Drawing.Drawing2D;

namespace videoplayer_burak_kizilkaya
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        OleDbConnection baglanti = new OleDbConnection("Provider=Microsoft.ACE.OLEDB.12.0;Data Source=videoplayer.accdb"); //bağlantı satırım
        OleDbCommand komut;
        OleDbDataReader dr;

        void temizle() //temizle metodu : metin kutularını temizler.
        {
            textBox1.Clear();
            richTextBox1.Clear();
            textBox3.Clear();
            textBox4.Clear();
            textBox1.Focus(); //video başlığı metin kutusuna odaklama işlemi yapar.
        }
        private void button1_Click(object sender, EventArgs e) //Dosya seç butonuna tıklandığında.
        {
            try
            {
                openFileDialog1.Title = "Video Seçiniz"; //FileDialogda sol üstte görünen bilgi mesajı.
                openFileDialog1.InitialDirectory = @"C:\Users\Public\Videos"; //Başlangıç veri yolu belirlenir.
                openFileDialog1.Filter = "Sadece Video Dosyaları (*.mp4,*.m4v,*.mp4v,*.avi,*.wmv,*.m2ts) | *.mp4;*.m4v;*.mp4v;*.avi;*.wmv;*.m2ts"; 
                //Filter ile geçerli uzantılar belirlenir.
                if (openFileDialog1.ShowDialog() == DialogResult.OK) //seçim tamamlandığında.
                {
                    textBox4.Text = openFileDialog1.SafeFileName; //SafeFileName yani video adı dosya adı olarak aktarılır.
                    textBox4.Enabled = true; //dosya adı metin kutusu aktif ve değiştirilebilir hale getirilir.
                }
                else //seçim tamamlanmadığında.
                {
                    MessageBox.Show("Video seçimi yapmadınız"); //uyarı verir.
                }
            }
            catch (Exception r)
            {
                MessageBox.Show("Hata! : "+r.ToString()); // hata mesajım.
            }     
        }
        private void Form1_Load(object sender, EventArgs e) //ekleme formunun ilk açılışında.
        {
            anaMenu frmGrad = new anaMenu(); //Anaformdaki public nesnelere ulaşabilmek için frmGrad nesnesi oluşturulur.
            this.Paint += new PaintEventHandler(frmGrad.set_background); //Public Metodum olan set_backgrounda bu şekilde ulaşıyorum ve boyama işlemi yapıyorum.
            textBox4.Enabled = false; //Dosya adı metin kutusu form ilk açıldığında pasif geliyor.
        }
        private void button2_Click(object sender, EventArgs e) //Onay butonuna tıklandığında.
        {
            try
            {
                baglanti.Open(); //bağlantı açılır.
                if (textBox1.Text==""||richTextBox1.Text==""||textBox3.Text==""||textBox4.Text=="") //alanların boş olup olmadığı kontrol edilir.
                {
                    MessageBox.Show("Lütfen eklemek istediğiniz videonun tüm bilgilerini eksiksiz giriniz.","Hata",MessageBoxButtons.OK,MessageBoxIcon.Warning);
                }
                else //metin kutuları boş değilse
                {  
                    //dosya adı metin kutusunda uzantı kontrolü yapılır.
                    //dosya adı metin kutusu .mp4 | .avi | .m4v gibi gibi uzantılar içermiyorsa
                    //hata mesajı verilir.
                    if (textBox4.Text.IndexOf(".mp4") == -1 && textBox4.Text.IndexOf(".avi") == -1 && textBox4.Text.IndexOf(".m4v") == -1 && textBox4.Text.IndexOf(".mp4v") == -1 && textBox4.Text.IndexOf(".m2ts") == -1 && textBox4.Text.IndexOf(".wmv") == -1)
                    {
                        MessageBox.Show(".mp4 - .m4v - .avi - .mp4v - .wmv - .m2ts | dosya isminin sonuna bu video formatlarından birini girmelisiniz.", "Hatalı/eksik video formatı", MessageBoxButtons.OK,MessageBoxIcon.Information);
                        Update();
                    }
                    else //eğer uzantı doğru şekilde girildiyse.
                    {
                        //Exists ile dosyanın var olup olmadığını kontrol ediyoruz.
                        //Aynı isimden dosya varsa ekleme işlemini yaptırtmıyoruz.
                        if (File.Exists(@"videolar\" + "" + textBox4.Text.ToString()))
                        {
                            MessageBox.Show("Aynı isimli bir video veritabanında mevcut!","Aynı videoyu eklemeye çalışıyorsunuz",MessageBoxButtons.OK,MessageBoxIcon.Information);
                        }
                        else //Aynı isimli dosya bulunmuyorsa ekleme işlemine başlıyoruz.
                        {
                            //Burada File.Copy ile debug içerisindeki videolar klasörüne,
                            //dosya adı olarak belirtilen ismiyle birlikte kopyalama işlemi yapıyorum.

                            File.Copy(openFileDialog1.FileName, @"videolar\" + "" + textBox4.Text.ToString());
                            komut = new OleDbCommand("insert into video(video_ad,video_aciklama,video_turu,video_dosya_adi,video_veriyolu) values ('" + textBox1.Text + "','" + richTextBox1.Text + "','" + textBox3.Text + "','" + textBox4.Text + "','videolar\\" + textBox4.Text.ToString() + "')", baglanti);
                            //veritabanına diğer verilerin girişini sağlıyorum.
                            int d= komut.ExecuteNonQuery(); //komut çalıştırılır.
                            //ExecuteNonQuery() fonksiyonu integer bir değer döndürür.
                            //Eğer fonksiyondan true bilgisi gelirse d değişkenim 1
                            //false bilgisi gelirse d değişkenim -1 alacak.
                            if (d>0) //bu koşul sağlanırsa video ekleme işlemini başarıyla tamamladı demektir.
                            {
                                MessageBox.Show("Video ekleme işlemi tamamlandı!", "Onay", MessageBoxButtons.OK, MessageBoxIcon.Information);
                            }
                            else //sağlanmazsa hata aldı ve verileri ekleyemedi demektir.
                            {
                                MessageBox.Show("Hata! Ekleme işlemi başarısız");
                            }
                            temizle(); //temizle metodu çalıştırılır.
                            Update();//C# ın update fonksiyonu.
                        }
                    }
                }
                baglanti.Close();// en son bağlantı kapatılır ve catch yapısına geçilir.
            }
            catch (Exception r )
            {
                MessageBox.Show(r.ToString());
            }
        }


        private void Form1_FormClosed(object sender, FormClosedEventArgs e) //ekleme formu kapandığında.
        {
            /*   anaMenu forum = new anaMenu();
                forum.dataGridYaz();
                forum.Show();*/
        }
    }
}
