namespace videoplayer_burak_kizilkaya
{
    partial class videoOynat
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(videoOynat));
            this.richTextBox1 = new System.Windows.Forms.RichTextBox();
            this.label1 = new System.Windows.Forms.Label();
            this.txtBaslik = new System.Windows.Forms.TextBox();
            this.lblName = new System.Windows.Forms.Label();
            this.lblTuru = new System.Windows.Forms.Label();
            this.txtTur = new System.Windows.Forms.TextBox();
            this.lblDosya = new System.Windows.Forms.Label();
            this.txtDosya = new System.Windows.Forms.TextBox();
            this.lblVeriyolu = new System.Windows.Forms.Label();
            this.txtVeri = new System.Windows.Forms.TextBox();
            this.axWindowsMediaPlayer1 = new AxWMPLib.AxWindowsMediaPlayer();
            this.button1 = new System.Windows.Forms.Button();
            ((System.ComponentModel.ISupportInitialize)(this.axWindowsMediaPlayer1)).BeginInit();
            this.SuspendLayout();
            // 
            // richTextBox1
            // 
            this.richTextBox1.Location = new System.Drawing.Point(1000, 44);
            this.richTextBox1.Name = "richTextBox1";
            this.richTextBox1.Size = new System.Drawing.Size(279, 168);
            this.richTextBox1.TabIndex = 2;
            this.richTextBox1.Text = "";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.BackColor = System.Drawing.Color.Transparent;
            this.label1.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label1.Location = new System.Drawing.Point(870, 44);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(117, 25);
            this.label1.TabIndex = 3;
            this.label1.Text = "Açıklama : ";
            // 
            // txtBaslik
            // 
            this.txtBaslik.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.txtBaslik.Location = new System.Drawing.Point(1000, 261);
            this.txtBaslik.Name = "txtBaslik";
            this.txtBaslik.Size = new System.Drawing.Size(279, 26);
            this.txtBaslik.TabIndex = 4;
            // 
            // lblName
            // 
            this.lblName.AutoSize = true;
            this.lblName.BackColor = System.Drawing.Color.Transparent;
            this.lblName.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.lblName.Location = new System.Drawing.Point(839, 260);
            this.lblName.Name = "lblName";
            this.lblName.Size = new System.Drawing.Size(155, 25);
            this.lblName.TabIndex = 5;
            this.lblName.Text = "Video Başlığı : ";
            // 
            // lblTuru
            // 
            this.lblTuru.AutoSize = true;
            this.lblTuru.BackColor = System.Drawing.Color.Transparent;
            this.lblTuru.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.lblTuru.Location = new System.Drawing.Point(859, 316);
            this.lblTuru.Name = "lblTuru";
            this.lblTuru.Size = new System.Drawing.Size(135, 25);
            this.lblTuru.TabIndex = 6;
            this.lblTuru.Text = "Video Türü : ";
            // 
            // txtTur
            // 
            this.txtTur.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.txtTur.Location = new System.Drawing.Point(1000, 315);
            this.txtTur.Name = "txtTur";
            this.txtTur.Size = new System.Drawing.Size(279, 26);
            this.txtTur.TabIndex = 7;
            // 
            // lblDosya
            // 
            this.lblDosya.AutoSize = true;
            this.lblDosya.BackColor = System.Drawing.Color.Transparent;
            this.lblDosya.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.lblDosya.Location = new System.Drawing.Point(866, 365);
            this.lblDosya.Name = "lblDosya";
            this.lblDosya.Size = new System.Drawing.Size(128, 25);
            this.lblDosya.TabIndex = 8;
            this.lblDosya.Text = "Dosya Adı : ";
            // 
            // txtDosya
            // 
            this.txtDosya.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.txtDosya.Location = new System.Drawing.Point(1000, 364);
            this.txtDosya.Name = "txtDosya";
            this.txtDosya.Size = new System.Drawing.Size(279, 26);
            this.txtDosya.TabIndex = 9;
            // 
            // lblVeriyolu
            // 
            this.lblVeriyolu.AutoSize = true;
            this.lblVeriyolu.BackColor = System.Drawing.Color.Transparent;
            this.lblVeriyolu.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.lblVeriyolu.Location = new System.Drawing.Point(877, 408);
            this.lblVeriyolu.Name = "lblVeriyolu";
            this.lblVeriyolu.Size = new System.Drawing.Size(118, 25);
            this.lblVeriyolu.TabIndex = 10;
            this.lblVeriyolu.Text = "Veri Yolu : ";
            // 
            // txtVeri
            // 
            this.txtVeri.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.txtVeri.Location = new System.Drawing.Point(1000, 407);
            this.txtVeri.Name = "txtVeri";
            this.txtVeri.Size = new System.Drawing.Size(279, 26);
            this.txtVeri.TabIndex = 11;
            // 
            // axWindowsMediaPlayer1
            // 
            this.axWindowsMediaPlayer1.Enabled = true;
            this.axWindowsMediaPlayer1.Location = new System.Drawing.Point(21, 12);
            this.axWindowsMediaPlayer1.Name = "axWindowsMediaPlayer1";
            this.axWindowsMediaPlayer1.OcxState = ((System.Windows.Forms.AxHost.State)(resources.GetObject("axWindowsMediaPlayer1.OcxState")));
            this.axWindowsMediaPlayer1.Size = new System.Drawing.Size(812, 531);
            this.axWindowsMediaPlayer1.TabIndex = 0;
            // 
            // button1
            // 
            this.button1.BackColor = System.Drawing.Color.Transparent;
            this.button1.BackgroundImage = global::videoplayer_burak_kizilkaya.Properties.Resources.delete;
            this.button1.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Zoom;
            this.button1.Location = new System.Drawing.Point(1226, 508);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(53, 52);
            this.button1.TabIndex = 12;
            this.button1.UseVisualStyleBackColor = false;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // videoOynat
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.Color.Silver;
            this.ClientSize = new System.Drawing.Size(1291, 572);
            this.Controls.Add(this.button1);
            this.Controls.Add(this.txtVeri);
            this.Controls.Add(this.lblVeriyolu);
            this.Controls.Add(this.txtDosya);
            this.Controls.Add(this.lblDosya);
            this.Controls.Add(this.txtTur);
            this.Controls.Add(this.lblTuru);
            this.Controls.Add(this.lblName);
            this.Controls.Add(this.txtBaslik);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.richTextBox1);
            this.Controls.Add(this.axWindowsMediaPlayer1);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedToolWindow;
            this.Name = "videoOynat";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Video Oynatma Formu @";
            this.FormClosed += new System.Windows.Forms.FormClosedEventHandler(this.videoOynat_FormClosed);
            this.Load += new System.EventHandler(this.videoOynat_Load);
            ((System.ComponentModel.ISupportInitialize)(this.axWindowsMediaPlayer1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private AxWMPLib.AxWindowsMediaPlayer axWindowsMediaPlayer1;
        private System.Windows.Forms.RichTextBox richTextBox1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label lblName;
        private System.Windows.Forms.Label lblTuru;
        private System.Windows.Forms.Label lblDosya;
        private System.Windows.Forms.Label lblVeriyolu;
        public System.Windows.Forms.TextBox txtBaslik;
        public System.Windows.Forms.TextBox txtTur;
        public System.Windows.Forms.TextBox txtDosya;
        public System.Windows.Forms.TextBox txtVeri;
        private System.Windows.Forms.Button button1;
    }
}