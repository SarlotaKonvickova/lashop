<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', env('APP_NAME'))</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/css/app.css"/>
    <script src="/js/app.js"></script>

</head>
<body>


<div id="searchResult">
    <header>
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="header-logo">
                            <img src="../../public/img/logo.png" alt="" style="height: 80px">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="header-search">
                            <form v-on:submit.stop.prevent="find">
                                <input v-model="searchHere" type="text" class="input" placeholder="Hledat...">
                                <button class="search-btn" :disabled="searching">Hledat</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
</div>


<footer id="footer">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="contact-author row col-md-12">
                    <b>Šarlota Konvičková</b>
                </div>
                <div class="row col-md-12" style="padding-left: 3px">
                    <ul class="contact-list">
                        <li class="contact-social-network"><a href="mailto:st47119@student.upce.cz"
                                                              class="contact-social-network-link"><i
                                    class="fas fa-at"></i></a></li>
                        <li class="contact-social-network"><a href="https://www.facebook.com/sarli.konvickova"
                                                              class="contact-social-network-link"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li class="contact-social-network"><a href="https://www.linkedin.com/in/skonvickova/"
                                                              class="contact-social-network-link"><i
                                    class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="//unpkg.com/vue"></script>
<script src="//unpkg.com/vue-plain-pagination"></script>

<script>
    Vue.component('v-pagination', window['vue-plain-pagination']);

    const searchResult = new Vue({
        el: '#searchResult',
        data() {
            return {
                searchHere: '',
                products: [],
                searching: false,
                currentPage: 1,
                total: 1,
                bootstrapPaginationClasses: { // http://getbootstrap.com/docs/4.1/components/pagination/
                    ul: 'pagination',
                    li: 'page-item',
                    liActive: 'active',
                    liDisable: 'disabled',
                    button: 'page-link'
                },
                customLabels: {
                    first: false,
                    prev: 'Předchozí',
                    next: 'Následující',
                    last: false
                }
            }
        },
        watch: {
            currentPage: function (newQuestion) {
                this.currentPage = newQuestion;
                this.listing();
            }
        },
        created() {
            this.find();
        },
        methods: {
            listing() {
                this.searching = true;
                axios.get('/searched', {
                    params: {
                        word: this.searchHere,
                        currentPage: this.currentPage,
                    }
                })
                    .then(response => {
                        this.products = response.data.data;
                        this.currentPage = response.data.current_page;
                        this.total = response.data.last_page;
                        this.searching = false
                    }).catch(error => {
                    alert(error.message);
                })
            },
            find: function () {
                this.currentPage = 1;
                this.listing();
            }
        }
    })
</script>

</body>
</html>
