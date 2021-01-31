<template>
    <div class="card col-md-12">
        <div class="card-body">
            <h1 class="card-title">Send Mail</h1>
            <form class="col-md-6">
                <div class="mb-3">
                    <label for="to" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="to" v-model="to" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" v-model="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" rows="10" v-model="message" required></textarea>
                </div>
                <a @click="sendEmail" class="btn btn-primary">Submit</a>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'send-mail',
        data: () => ({
            to: '',
            subject: '',
            message: '',
        }),
        methods: {
            sendEmail() {
                if (!this.to || !this.subject || !this.message) return false

                axios.post('/api/mail', {
                    to: this.to,
                    subject: this.subject,
                    message: this.message,
                }).then(() => this.$router.push({ name: 'home' }))
            },
        }
    }
</script>
