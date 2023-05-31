<template>

    <template v-if="step === 1">
        <div class="mx-auto prose">

            <h2 class="text-3xl text-center">
                Confirme seu email antes de prosseguir
            </h2>

            <span>Prossiga com o seu e-mail atual cadastrado ou altere se desejar falar conosco através de outro e-mail.</span>

            <input v-model="form.email" required type="email" class="mt-4 block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            <button @click="next()" class="mt-4 w-full bg-pink-500 text-white uppercase font-bold justify-center inline-flex items-center rounded-sm border border-pink-500 px-3 py-3 leading-4 text-pink-500 hover:bg-pink-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2">Prosseguir com este email</button>

        </div>
    </template>

    <template v-else>

        <div class="flex items-center justify-start space-x-4">
            <label for="">
                <input type="radio" v-model="form.personType" name="personType" value="pf" class="rounded-full border-gray-300 text-pink-500 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 disabled:opacity-50">
                <span class="ml-2">Pessoa Física</span>
            </label>
            <label for="">
                <input type="radio" v-model="form.personType" name="personType" value="pj" class="rounded-full border-gray-300 text-pink-500 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 disabled:opacity-50">
                <span class="ml-2">Pessoa Jurídica</span>
            </label>
        </div>

        <div v-if="this.form.personType === 'pf'" class="flex justify-between gap-2">
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">Nome<span class="text-red-500">*</span></span>
                <input  type="text" v-model="form.name" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">CPF<span class="text-red-500">*</span></span>
                <input required type="tel" v-model="form.document" v-mask="'###.###.###-##'" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
        </div>

        <div v-if="this.form.personType === 'pj'" class="flex justify-between gap-2">
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">Nome fantasia<span class="text-red-500">*</span></span>
                <input required type="text" v-model="form.fantasyName" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">Nome do Contato<span class="text-red-500">*</span></span>
                <input required type="text" v-model="form.name" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
        </div>

        <div v-if="this.form.personType === 'pj'" class="flex justify-between gap-2">
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">Cargo do Contato<span class="text-red-500">*</span></span>
                <input required type="text" v-model="form.contactRole" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">Setor do Contato<span class="text-red-500">*</span></span>
                <input required type="text" v-model="form.contactSector" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
        </div>

        <div v-if="this.form.personType === 'pj'" class="w-full">
            <span class="block mb-1 text-gray-800 font-sans">CNPJ</span>
            <input type="tel" v-model="form.documentAlt" v-mask="'##.###.###/####-##'" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
        </div>

        <div class="flex justify-between gap-2">
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">CEP<span class="text-red-500">*</span></span>
                <input required type="tel" v-model="form.zipcode" v-mask="'#####-###'" @keyup="searchCep()" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">UF<span class="text-red-500">*</span></span>
                <input required type="text" v-model="form.state" v-mask="'AA'" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">Cidade<span class="text-red-500">*</span></span>
                <input required type="text" v-model="form.city" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
        </div>

        <div class="w-full">
            <span class="block mb-1 text-gray-800 font-sans">Rua<span class="text-red-500">*</span></span>
            <input required type="text" v-model="form.street" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
        </div>

        <div class="flex justify-between gap-2">
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">Número<span class="text-red-500">*</span></span>
                <input required type="tel" v-model="form.number" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">Complemento</span>
                <input type="text" v-model="form.complement" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">Bairro<span class="text-red-500">*</span></span>
                <input required type="text" v-model="form.district" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
        </div>

        <div class="flex justify-between gap-2">
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">E-mail<span class="text-red-500">*</span></span>
                <input required type="email" v-model="form.email" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">Celular<span class="text-red-500">*</span></span>
                <input required type="tel" v-model="form.whatsapp" v-mask="'(##) # ####-####'" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
            <div class="w-full">
                <span class="block mb-1 text-gray-800 font-sans">Telefone</span>
                <input type="tel" v-model="form.phone" v-mask="'(##) ####-####'" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
            </div>
        </div>

        <div class="w-full">
            <span class="block mb-1 text-gray-800 font-sans">Assunto<span class="text-red-500">*</span></span>
            <input required type="text" v-model="form.subject" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed" />
        </div>

        <div class="w-full">
            <span class="block mb-1 text-gray-800 font-sans">Mensagem<span class="text-red-500">*</span></span>
            <textarea required v-model="form.message" placeholder="Deixe sua mensagem aqui" class="w-full block w-full border border-gray-300 focus:border-pink-500 focus:ring-0 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed"></textarea>
        </div>

        <button type="submit" class="mt-4 w-full bg-pink-500 text-white uppercase font-bold justify-center inline-flex items-center rounded-sm border border-pink-500 px-3 py-3 leading-4 text-pink-500 hover:bg-pink-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2">Enviar mensagem</button>

    </template>

</template>

<script>

export default {

    props: {
        form: {
            type: Object,
            required: true,
        },
    },

    data() {
        return {
            step: 2,
        }
    },

    mounted() {

        if (this.form.email) {
            this.step = 1;
        }

    },

    methods: {
        next() {
            if (this.form.email === '') {
                return;
            }

            this.step = 2;
        },

        searchCep() {
            if(this.form.zipcode.length === 9) {
                axios.get(`https://viacep.com.br/ws/${ this.form.zipcode }/json/`)
                    .then(
                        (response) => {
                            if (response.data.erro) {
                                this.form.state = '';
                                this.form.city = '';
                                this.form.district = '';
                                this.form.street = '';

                                this.errorMessage = 'Ocorreu um erro ao consultar o CEP, tente novamente!';
                                this.hasErrors = true;
                                return;
                            }

                            this.form.state = response.data.uf;
                            this.form.city = response.data.localidade;
                            this.form.district = response.data.bairro;
                            this.form.street = response.data.logradouro;

                            this.errorMessage = '';
                            this.hasErrors = false;
                        }
                    )
                    .catch(
                        (error) => {
                            this.errorMessage = 'Ocorreu um erro ao consultar o CEP, tente novamente!';
                            this.hasErrors = true;
                        }
                    )
            }
        },
    },

}

</script>
