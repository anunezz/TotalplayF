//import $ from 'jquery';
export const RouterPush = {
computed: {
    //https://github.com/reegodev/vue-screen
    mediaWidth() {
        let width = '';
        if( this.$screen.width < 950 ){
            if (this.section === true) {
                width = '95%';
            }else{
                width = '70%';
            }
        }else{
            if (this.section === true) {
                width = '65%';
            }else{
                width = '25%';
            }
        }
        return width;
    },
    screenWidth() {
        // let aux = 'mr-auto';
        // if(this.$screen.width >= 991 ){
        //     let aux = 'mc-auto';
        // }
        let aux = this.$screen.width;

        return aux;
    }
},
// mounted() {
//     this.currentUrl();
// },
methods: {
    currentUrl(url = this.$router.history.current.path){
        $(".dropdown-menu").removeClass("show");
        let nexmun = document.getElementById("nexmun");
            nexmun.style.color = "#fff";
        let nexmun2 = document.getElementById("nav-item-nexmun");
            nexmun2.classList.remove("active");
            document.getElementById("residencial").style.color = "#fff";
            document.getElementById("netflix").style.color = "#fff";
            document.getElementById("amazon").style.color = "#fff";
            if(url !== '/'){
                console.log("url: ",url);
                url = url.split("/");
                url = ( url[1] === '' )?'/': '/'+url[1];
            }

            console.log("url: ",url);

        switch (url) {
            case '/':
            {
                setTimeout(() => {
                    nexmun2.classList.add('active');
                    document.getElementById("nexmun").style.color = "#6f42c1";
                }, 200);
                this.$store.commit('menu/selectMenuActive',0);
                console.log("/ : ",this.activeMenu);
                break;
            }
            case '/residencial':
            {
                this.$store.commit('menu/selectMenuActive',1);
                console.log("/residencial : ",this.activeMenu);
                document.getElementById("residencial").style.color = "#FFEB3B";
                break;
            }
            case '/netflix':
            {
                this.$store.commit('menu/selectMenuActive',2);
                console.log("/netflix : ",this.activeMenu);
                document.getElementById("netflix").style.color = "#B71C1C";
                break;
            }
            case '/amazon-prime':
            {
                this.$store.commit('menu/selectMenuActive',3);
                console.log("/amazon : ",this.activeMenu);
                document.getElementById("amazon").style.color = "#81D4FA";
                break;
            }
            // case '/terminos-y-condiciones':
            // {
            //     document.getElementById("nexmun").style.color = "#fff";
            //     document.getElementById("residencial").style.color = "#fff";
            //     document.getElementById("netflix").style.color = "#fff";
            //     document.getElementById("amazon").style.color = "#fff";
            //     break;
            // }
            default:
            {
                document.getElementById("nexmun").style.color = "#fff";
                document.getElementById("residencial").style.color = "#fff";
                document.getElementById("netflix").style.color = "#fff";
                document.getElementById("amazon").style.color = "#fff";
                break;
            }
        }
    }
},

};
