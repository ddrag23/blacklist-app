import Swal from 'sweetalert2'

export function addButton(el, btnClass, childEl, fn) {
  return {
    el: el,
    class: btnClass,
    child: childEl,
    event: (param) => fn(param),
  }
}
export function onNotif(title, icon, message) {
  Swal.fire({
    title: title,
    icon: icon,
    text: message,
  })
}
export function onNotifWarning(cb) {
  Swal.fire({
    title: 'Apakah kamu yakin ?',
    text: 'Anda tidak akan bisa mengembalikan ini!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus itu!',
    cancelButtonText: 'Batal!',
  }).then((result) => {
    if (result.isConfirmed) {
      cb()
    }
  })
}
