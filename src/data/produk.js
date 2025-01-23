// data produk
document.addEventListener("alpine:init", () => {
  Alpine.data("produk", () => ({
    items: [
      {
        id: 1,
        name: "Nutrigrow Spray",
        img: "Produk-250-ml.jpeg",
        description: "Pupuk Organik Cair Nutrigrow 250 ml.",
        price: 15000,
      },
      {
        id: 2,
        name: "Nutrigrow Pure",
        img: "Produk-100-ml.jpeg",
        description: "Pupuk Organik Cair Nutrigrow 100 ml.",
        price: 25000,
      },
    ],
  }));

  // add cart
  Alpine.store("cart", {
    items: [],
    total: 0,
    quantity: 0, // jumlah harga

    // untuk memasukkan data ke dalam keranjang
    add(newItem) {
      // cek apakah ada barang yang sama di cart
      const cartItem = this.items.find((item) => item.id === newItem.id);

      // jika cart masih kosong
      if (!cartItem) {
        this.items.push({ ...newItem, quantity: 1, total: newItem.price });
        this.quantity++;
        this.total += newItem.price;
      } else {
        this.item = this.items.map((item) => {
          // jika barang berbeda
          if (item.id !== newItem.id) {
            return item;
          } else {
            // jika barang sudah ada
            item.quantity++;
            item.total = item.price * item.quantity;
            this.quantity++;
            this.total += item.price;
            return item;
          }
        });
      }

      // this.items.push(newItem); // memasukkan data produk
      // this.quantity++; // untuk total produk
      // this.total += newItem.price; // menjumlahkan harga setiap produk yang dipilih
    },

    // remove btn
    remove(id) {
      // ambil item yang mau diremove berdasarkan id
      const cartItem = this.items.find((item) => item.id === id);

      // jika item lebih dari 1
      if (cartItem.quantity > 1) {
        // telusuri satu persatu
        this.items = this.items.map((item) => {
          // jika bukan barang yang dipilih
          if (item.id !== id) {
            return item;
          } else {
            item.quantity--;
            item.total = item.price * item.quantity;
            this.quantity--;
            this.total -= item.price;
            return item;
          }
        });
      } else if (cartItem.quantity === 1) {
        // jika barang sisa 1
        this.items = this.items.filter((item) => item.id != id);
        this.quantity--;
        this.total -= cartItem.price;
      }
    },
  });
});

// form konfirmasi
const checkoutButton = document.querySelector(".checkout-button");
checkoutButton.disabled = true; // agar btn disabled

const form = document.querySelector("#checkoutForm");
form.addEventListener("keyup", function () {
  for (let i = 0; i < form.elements.length; i++) {
    if (form.elements[i].value.length !== 0) {
      checkoutButton.classList.remove("disabled");
      checkoutButton.classList.add("disabled");
    } else {
      return false;
    }
  }
  checkoutButton.disabled = false;
  checkoutButton.classList.remove("disabled");
});

// kirim data dengan btn
checkoutButton.addEventListener("click", async function (e) {
  e.preventDefault();
  const formData = new FormData(form); // ambil dari form
  const data = new URLSearchParams(formData);
  const objData = Object.fromEntries(data);
  // const message = formatDataMessage(objData);
  // window.open("http://wa.me/6281996719560?text=" + encodeURIComponent(message));

  // buat payment
  // meminta token transaksi dengan ajax / fetch
  try {
    const response = await fetch("../../php/order.php", {
      method: "POST",
      body: data,
    });

    const token = await response.text();
    // console.log(token);
    // menampilkan pop up payment
    window.snap.pay(token);
  } catch (err) {
    console.log(err.message);
  }
});

// untuk mengirim lewat wa
const formatDataMessage = (obj) => {
  return `Data Customer \n
   Nama : ${obj.nama}
   No Whatsapp : ${obj.whatsapp}
   ALamat : ${obj.alamat}
   Kota : ${obj.koda}
   Kode pos : ${obj.kode_pos} \n
Data Orderan \n
  ${JSON.parse(obj.items).map(
    (item) => `${item.name} (${item.quantity} x ${rupiah(item.total)}) \n`
  )}
  Total pembayaran : ${rupiah(obj.total)}`;
};

// konversi ke rupiah
const rupiah = (number) => {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
  }).format(number);
};
