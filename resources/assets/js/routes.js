export default [
    {path: '/', redirect: {name:'library'}},
    {path: '/qr/:uniqId',component: require('./components/App.vue')},
    {path: '/library', name:'library', component: require('./components/Library.vue')},
    {path: '/index', component: require('./components/ExampleComponent.vue')}
];