function DeleteAllFacebook() {
    Swal.fire({
        title: 'CẢNH BÁO?',
        text: 'Bạn có muốn xóa toàn bộ tài khoản Facebook ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Đồng Ý',
        cancelButtonText: ' Huỷ'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Deleted!',
                'Xoá thành công',
                'success'
            )
            window.location = '/deleteaccount?deleteallfacebook';
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'Bạn đã huỷ xoá',
                'error'
            )
        }

    })
}
function DeleteAllGas() {
    Swal.fire({
        title: 'CẢNH BÁO?',
        text: 'Bạn có muốn xóa toàn bộ tài khoản Garena?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Đồng Ý',
        cancelButtonText: ' Huỷ'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Deleted!',
                'Xoá thành công',
                'success'
            )
            window.location = '/deleteaccount?DeleteAllGas';
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'Bạn đã huỷ xoá',
                'error'
            )
        }

    })
}
function DeleteAllGasAuthen() {
    Swal.fire({
        title: 'CẢNH BÁO?',
        text: 'Bạn có muốn xóa toàn bộ tài khoản Garena Authen?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Đồng Ý',
        cancelButtonText: ' Huỷ'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Deleted!',
                'Xoá thành công',
                'success'
            )
            window.location = '/deleteaccount?DeleteAllGasAuthen';
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'Bạn đã huỷ xoá',
                'error'
            )
        }

    })
}
function DeleteAllGasTTT() {
    Swal.fire({
        title: 'CẢNH BÁO?',
        text: 'Bạn có muốn xóa toàn bộ tài khoản Garena Trắng Thông Tin?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Đồng Ý',
        cancelButtonText: ' Huỷ'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Deleted!',
                'Xoá thành công',
                'success'
            )
            window.location = '/deleteaccount?DeleteAllGasTrang';
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'Bạn đã huỷ xoá',
                'error'
            )
        }

    })
}
function DeleteAllGasLoiPassword() {
    Swal.fire({
        title: 'CẢNH BÁO?',
        text: 'Bạn có muốn xóa toàn bộ tài khoản Garena Lỗi Password?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Đồng Ý',
        cancelButtonText: ' Huỷ'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Deleted!',
                'Xoá thành công',
                'success'
            )
            window.location = '/deleteaccount?DeleteAllGasLoiPassWord';
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'Bạn đã huỷ xoá',
                'error'
            )
        }

    })
}