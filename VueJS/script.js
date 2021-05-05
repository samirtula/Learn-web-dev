let objApp = new Vue({
    el: '#app',
    data: {
        message: 'Привет я Vue.js ' + new Date().toLocaleString()
    }
})
let objApp2 = new Vue({
    el: '#app2',
    data: {
        conditionSeen: true,
    }
})

let objApp3 = new Vue({
    el: '#app3',
    data: {
        todoList: [
            {make: 'Почистить зубы'},
            {make: 'Позавтракать'},
            {make: 'Созидать'},
        ]
    }
})

let transitionDemo = new Vue({
    el: '#demo',
    data: {
        show: true
    }
})

let objApp4 = new Vue({
    el: '#app4',
    data: {
        message: ')nottub dekcilc uoY .on hO'
    },
    methods: {
        reverseMessage: function () {
            this.message = this.message.split('').reverse().join('')
        }
    }
})

let objApp5 = new Vue({
    el: '#app5',
    data: {
        message: 'Изменяем текст'
    }
});
// СОЗДАЕМ И РАБОТАЕМ С КОМПОНЕНТОМ VUE

Vue.component('componen', {
    props: ['make'],
    template: '<li> {{ make.text }} </li>'
})

let appX = new Vue({
    el: '#appX',
    data: {
        todoList: [
            {id: 0, text: 'Почистить зубы'},
            {id: 1, text: 'Позавтракать'},
            {id: 2, text: 'Созидать'},
        ],
    }
})
//ИНТЕРПОЛЯЦИИ
let interpolations = new Vue({
    el: '#appInterpolation',
    data: {
        msg: "точно",
        HTML: "<span style='color:red'>Красный текст v-html</span>",
        bind: 'id',
        isButtonDisabled: true,
        number: 7,
        ok: 1,
        message: 'Развернутое сообщение'
    }
})
//ДИРЕКТИВЫ
let directives = new Vue({
    el: '#directives',
    data: {
        seen: true,
        url: 'http://gakhramanov.site',
        event: 'mouseover',
        tel: "[0-9]{1} [0-9]{3} [0-9]{3} [0-9]{4}",
        name: '',
        secondName: '',
        telNum: '',
    },
    methods: {
        doSomething: function () {
            alert('Focus')
        },
        ajax: function () {
            axios.post('handle.php', {
                first_name: this.name,
                second_name: this.second_name,
                telephone: this.telNum
            }).then(response => console.log(response))
        }
    },
})
//ВЫЧИСЛЯЕМЫЕ СВОЙСТВА И СЛЕЖЕНИЕ
let computed = new Vue({
    el: "#computed",
    data: {
        message: 'How you doing guys',
    },
    computed: {
        reversedMessage: function () {
            return this.message.split('').reverse().join('')
        },
        now: function () {
            return Date.now()
        }
    }
})