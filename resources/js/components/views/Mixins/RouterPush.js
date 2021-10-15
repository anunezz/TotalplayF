export const RouterPush = {
mounted(){
    this.linkss();
},
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
    },
    titleModal(){
        return this.section ? "Selecciona la cobertura de tu ciudad" : "Iniciar sesión";
    }
},
data() {
    return {
        itemMenu:[]
    }
},
methods: {
    linkss(){
        let aux = this.$router.history.current.path;
            document.getElementById("nexmun").style.color = "#fff";
            document.getElementById("residencial").style.color = "#fff";
            document.getElementById("netflix").style.color = "#fff";
            document.getElementById("amazon").style.color = "#fff";
        console.log("Path: ",aux);
        switch (aux) {
            case '/':
            {
                document.getElementById("nexmun").style.color = "#6f42c1";
                let input = document.getElementById("residencial"); document.write(input.classList);
                console.log("Input: ",input);
                break;
            }
            case '/residencial':
            {
                document.getElementById("residencial").style.color = "#FFEB3B";
                let input = document.getElementById("residencial"); document.write(input.classList);
                console.log("Input: ",input);
                break;
            }
            case '/netflix':
            {
                document.getElementById("netflix").style.color = "#B71C1C";
                break;
            }
            case '/amazon':
            {
                document.getElementById("amazon").style.color = "#81D4FA";
                break;
            }
            case '/terminos-y-condiciones':
            {
                document.getElementById("nexmun").style.color = "#fff";
                document.getElementById("residencial").style.color = "#fff";
                document.getElementById("netflix").style.color = "#fff";
                document.getElementById("amazon").style.color = "#fff";
                break;
            }
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
