<script>
    
        const name = document.getElementById("name");
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const passwordConfirm = document.getElementById("password-confirm");
        const restaurantName = document.getElementById("restaurant-name");
        const address = document.getElementById("address");
        const p_iva = document.getElementById("p_iva");
        const image = document.getElementById("image");
        const phone = document.getElementById("phone");
        const delivery_cost = document.getElementById("delivery_cost");
        const min_order = document.getElementById("min_order");
        const price = document.getElementById("price");
        const description = document.getElementById("description");
        const formCheck = document.querySelector(".form-check");
        const types = document.querySelectorAll("input[type=checkbox]");
        const form = document.querySelector('.submit-form');
                    
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            let validation = true;
                    
            if (!name.value) {
                name.classList.add('is-invalid');
                validation = false;
            }
            

            const validRegex = /^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$/;

            if (!email.value || !email.value.match(validRegex)) {
                email.classList.add('is-invalid');
                validation = false;
            } 

            if (!password.value || password.value.length < 8) {
                password.classList.add('is-invalid');
                validation = false;
            }

            if (!passwordConfirm.value || passwordConfirm.value !== password.value) {
                passwordConfirm.classList.add('is-invalid');
                validation = false;
            }
            
            if (!restaurantName.value) {
                restaurantName.classList.add('is-invalid');
                validation = false;
            }

            if (!address.value) {
                address.classList.add('is-invalid');
                validation = false;
            }

            if (!p_iva.value || isNaN(p_iva.value) || p_iva.value.length !== 11) {
                p_iva.classList.add('is-invalid');
                validation = false;
            }

            const filePath = image.value;
            const allowedExtensions =
                /(\.jpg|\.jpeg|\.png|\.svg)$/i;

            if (!allowedExtensions.exec(filePath) && image.value) {
                image.value = '';
                image.classList.add('is-invalid');
                validation = false;
            }

            if (!phone.value || isNaN(phone.value)) {
                phone.classList.add('is-invalid');
                validation = false;
            }

            if (isNaN(delivery_cost.value) || delivery_cost.value < 0 || delivery_cost.value > 10) {
                delivery_cost.classList.add('is-invalid');
                validation = false;
            }

            if (isNaN(min_order.value) || min_order.value < 0 ) {
                min_order.classList.add('is-invalid');
                validation = false;
            }
            
            let isChecked = false;
            types.forEach(type => {
                if (type.checked) isChecked = true;
            });

            if (!isChecked) {
                formCheck.classList.add('is-invalid');
                validation = false;
                console.log(formCheck);
            }

            if (validation) form.submit();
        });
</script>