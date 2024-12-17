// Fungsi untuk menampilkan hasil download
const showDownload = (result) => {
    console.log("Download selesai");
    console.log(`Hasil Download: ${result}`);
  };
  
  // Fungsi untuk download file menggunakan Promise
  const download = () => {
    return new Promise((resolve) => {
      console.log("Sedang mendownload...");
      setTimeout(() => {
        const result = "windows-10.exe";
        resolve(result);
      }, 3000);
    });
  };
  
  // Menggunakan async/await untuk menangani Promise
  const performDownload = async () => {
    try {
      const result = await download();
      setTimeout(() => {
        showDownload(result);
      }, 3000);
    } catch (error) {
      console.error("Terjadi kesalahan saat mendownload:", error);
    }
  };
  
  performDownload();
  