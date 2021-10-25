Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'You are not currently logged in, please log in first!',
confirmButtonText: 'Ok',
footer: '<a href="{{ route('register') }}" class="click-register-btn">No account, click here to register</a>',
}).then((result) => {
if (result.isConfirmed) {
window.location.href = `{{ route('login') }}`
}
})

return false;
