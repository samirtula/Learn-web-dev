let button = document.querySelectorAll('button.delete');
button.forEach(function (item) {
    item.addEventListener('click', function (e) {
        let productId = this.dataset.id;
        let params = {
            'id': productId,
            'method': "delete"
        };
        let response = fetch('/handle.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(params)
        });
    });
});
let updatesButtons = document.querySelectorAll('.update');
updatesButtons.forEach(function (item) {
    console.log(item);
    item.addEventListener('click', function () {
        let popupButton = document.querySelector('.popup');
        popupButton.style.display = 'flex';
        console.log(popupButton);
        let productId = this.dataset.id;
        let params = {
            'id': productId,
            'method': "getProduct"
        };

        let response = fetch('/handle.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(params)
        }).then((response) => {
            return response.json();
        })
            .then((data) => {
                console.log(data);
                let form = document.querySelector(".popup__form");
                form.querySelector("input[name=id]").value = data[0].id;
                form.querySelector("input[name=Name]").value = data[0].name;
                form.querySelector("input[name=Price]").value = data[0].price;
                form.querySelector("input[name=Active]").value = data[0].active;
                form.querySelector("input[name=Description]").value = data[0].description;
            });

    });
});

let formButton = document.querySelector(".popup__form");
console.log(formButton);
formButton.addEventListener("submit", function (e) {
    e.preventDefault();
    let temp = {
        method: 'update',
        id: this.querySelector("input[name=id]").value,
        name: this.querySelector("input[name=Name]").value,
        price: this.querySelector("input[name=Price]").value,
        active: this.querySelector("input[name=Active]").value,
        description: this.querySelector("input[name=Description]").value,
    };
    console.log(temp);
    let response = fetch('/handle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(temp)
    }).then((response) => {
        return response.json();
    })
        .then((data) => {
            console.log(data)

        });
});

const formAddProduct = document.querySelector('#add-product');
console.log(formAddProduct);
formAddProduct.addEventListener("submit", function (e) {
    e.preventDefault();
    let temp = {
        method: 'add',
        name: this.querySelector("input[name=name]").value,
        price: this.querySelector("input[name=price]").value,
        active: this.querySelector("input[name=active]").value,
        description: this.querySelector("input[name=description]").value,
    };

    let objFormData = new FormData();
    //console.log(this.querySelector('input[name=file_img]').files);
    objFormData.append('file_img', this.querySelector('input[name=file_img]').files[0]);
    //console.log(objFormData.getAll());
    for (let item in temp) {
        console.log(item);
        objFormData.append(item, temp[item]);
    }

    let response = fetch('/handle.php', {
        method: 'POST',
        headers: {
            //'Content-Type': 'multipart/form-data'
        },
        body: objFormData
    }).then((response) => {
        return response.json();
    }).then((data) => {
        console.log(data)
        if ('error' in data) {
            console.log('ERROR')
            document.querySelector('.error').innerHTML = data.error;
        }
    });
});

