<template>
    <div class="card col-md-12">
        <div class="card-body">
            <h1 class="card-title">Mails <router-link :to="{'name': 'email-create'}" class="float-right">+</router-link></h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Status</th>
                    <th scope="col">To</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="mail in mails">
                    <th scope="row">{{mail.id}}</th>
                    <td>{{mail.status}}</td>
                    <td>{{mail.to}}</td>
                    <td>{{mail.subject | truncate}}</td>
                    <td>{{mail.message | truncate}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'email-list',
        data: () => ({
            mails: [],
        }),
        mounted() {
            this.getMails()
        },
        methods: {
            getMails() {
                axios.get('/api/mail')
                    .then(res => this.mails = res.data)
            }
        },
        filters: {
            truncate: (str) => {
                const num = 20

                if (str.length <= num) {
                    return str
                }

                return str.slice(0, num) + '...'
            }
        },
    }
</script>
