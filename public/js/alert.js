// Function Sweet alert
function swal(status, message = null, url = null) {
    if (status == "success") {
        if (message == null) {
            message = "Data saved successfully";
        }
        Swal.fire({
            title: "Saved",
            text: "" + message,
            icon: "success",
        });
    } else if (status == "redirect") {
        Swal.fire({
            title: "Saved",
            text: "" + message,
            icon: "success",
        }).then((okay) => {
            if (okay) {
                if (url) {
                    window.location.href = url;
                } else {
                    location.reload();
                }
            }
        });
    } else {
        if (message == null) {
            message = "Data saved failed";
        }
        Swal.fire({
            title: "Error",
            text: "" + message,
            icon: "error",
        });
    }
}

var toastMixin = Swal.mixin({
    toast: true,
    icon: "success",
    title: "General Title",
    animation: false,
    position: "top-right",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});


function swalConfirm(onConfirmed, text = "You won't be able to revert this!", manualfire = false) {
    this.option = {
        title: "Are you sure?",
        text: text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, sure",

        customClass: {
            confirmButton: "btn btn-danger",
            cancelButton: "btn btn-outline-primary ms-2"
        },
        buttonsStyling: false
    }
    this.fire = () => {
        Swal.fire(this.option).then((result) => {
            if (result.isConfirmed) {
                onConfirmed();
            }
        });
    }
    if (!manualfire) this.fire();
}
