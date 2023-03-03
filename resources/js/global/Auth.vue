<template>
    <div class="page__wrapper">
        <div class="container w-100 h-100 d-flex justify-content-center align-items-center">
            <va-card>
                <va-card-content>
                    <div class="d-flex flex-wrap justify-content-center">
                        <div>
                            <div v-if="!isLogin" class="mb-4">
                                <va-input
                                    v-model="form.name"
                                    label="Name"
                                    :error="errors.name.length > 0"
                                    :error-messages="errors.name"
                                    @keydown="resetErrors('name')"
                                />
                            </div>
                            <div class="mb-4">
                                <va-input
                                    v-model="form.email"
                                    label="Email"
                                    type="email"
                                    :error="errors.email.length > 0"
                                    :error-messages="errors.email"
                                    @keydown="resetErrors('email')"
                                />
                            </div>
                            <div class="mb-4">
                                <va-input
                                    v-model="form.password"
                                    label="Password"
                                    type="password"
                                    :error="errors.password.length > 0"
                                    :error-messages="errors.password"
                                    @keydown="resetErrors('password')"
                                />
                            </div>
                            <div v-if="!isLogin" class="mb-4">
                                <va-input
                                    v-model="form.password_confirmation"
                                    label="Password Confirmation"
                                    type="password"
                                    :error="errors.password_confirmation.length > 0"
                                    :error-messages="errors.password_confirmation"
                                    @keydown="resetErrors('password_confirmation')"
                                />
                            </div>
                        </div>
                        <div class="m-4">
                            <strong>
                                {{ labelString }}
                            </strong> <br />
                            <span v-if="isLogin">
                                Don't have an account? <a href="/register">Register now</a>
                            </span>
                            <span v-else>
                                Is already have an account? <a href="/login">Login now</a>
                            </span>
                        </div>
                    </div>
                    <va-button @click="requestSend" :disabled="isSent">
                        <span v-if="isLogin">Login</span>
                        <span v-else>Register</span>
                        <loader :active="isSent" :size="'sm'" />
                    </va-button>
                </va-card-content>
            </va-card>
        </div>
        <div class="rectangle-interactive rectangle-interactive__xlg"></div>
        <div class="rectangle-interactive rectangle-interactive__lg"></div>
        <div class="rectangle-interactive rectangle-interactive__md"></div>
        <div class="rectangle-interactive rectangle-interactive__sm"></div>
    </div>
</template>

<script>
import Loader from "../components/UI/Loader.vue";
import {login, register} from '../api/auth';
import {setLocalItem, getLocalItem} from '../libs/LocalStorage';

export default {
    name: "Auth",
    components: {Loader},
    data() {
        return {
            authType: '',
            loginType: 'login',
            form: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            },
            errors: {
                name: [],
                email: [],
                password: [],
                password_confirmation: [],
            },
            isSent: false,
        }
    },
    computed: {
        isLogin() {
            return this.authType === this.loginType;
        },
        labelString() {
            if (this.authType === this.loginType) {
                return 'Sign in for getting more service functionality!'
            } else {
                return 'Sign up for getting more service functionality!';
            }
        },
    },
    methods: {
        resetErrors(fieldName) {
            if (fieldName && this.errors.hasOwnProperty(fieldName)) {
                this.errors[fieldName] = [];
            }
        },
        async requestSend() {
            this.isSent = true;
            try {
                let response = null;
                if (this.authType === this.loginType) {
                    const {email, password} = this.form;
                    const {data} = await login({email, password});
                    response = data;
                } else {
                    const {data} = await register({...this.form});
                    response = data;
                }

                setLocalItem('user', response.data);
                window.location.href = process.env.REDIRECT_AFTEER_LOGIN ?? '/';
            } catch (e) {
                this.isSent = false;
                if (e.response && e.response.status === 422) {
                    for (let key in e.response.data.errors) {
                        this.errors[key] = e.response.data.errors[key];
                    }
                } else {
                    console.error(e);
                }
            }
        },
    },
    created() {
        this.authType = window.location.pathname.slice(1);
    }
}
</script>

<style lang="scss" scoped>
.page__wrapper {
    height: 94vh;
    width: 100%;
    position: relative;
    overflow: hidden;
}

.rectangle-interactive {
    border-radius: 50%;
    position: absolute;
    opacity: .5;
    bottom: -5%;
    z-index: -1000;
    transition: .7s;

    &__xlg {
        animation: rect_rise_xlg 1s linear forwards;
        width: 120em;
        height: 120em;
        background-color: #719de9;
        bottom: -30%;
        right: -30%;
    }

    &__lg {
        animation: rect_rise_lg 1s linear forwards;
        width: 50em;
        height: 50em;
        background-color: #0a53be;
        right: -5em;
    }

    &__md {
        animation: rect_rise_md 1s linear forwards;
        width: 35em;
        height: 35em;
        background-color: #20c997;
        right: 1em;
    }

    &__sm {
        animation: rect_rise_sm 1s linear forwards;
        width: 15em;
        height: 15em;
        background-color: #bc83e5;
        right: 10em;
    }
}

@keyframes rect_rise_xlg {
    0% {
        width: 1em;
        height: 1em;
    }
    100% {
        width: 120em;
        height: 120em;
    }
}

@keyframes rect_rise_lg {
    0% {
        width: 1em;
        height: 1em;
    }
    100% {
        width: 50em;
        height: 50em;
    }
}

@keyframes rect_rise_md {
    0% {
        width: 1em;
        height: 1em;
    }
    100% {
        width: 35em;
        height: 35em;
    }
}

@keyframes rect_rise_sm {
    0% {
        width: 1em;
        height: 1em;
    }
    100% {
        width: 15em;
        height: 15em;
    }
}
</style>
