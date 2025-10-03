<template>
    <div class="GitHubEventForm">
        <h1>[GitHub Event Name]</h1>
        <h2>[Date, Location]</h2>
        <p>[Description]</p>
        <PrimaryButton>
            <a href="[google form link here]" target="_blank">Sign Up</a>
        </PrimaryButton>
    </div>
</template>

<script>
import PrimaryButton from './PrimaryButton.vue';

export default {
    components: { PrimaryButton }
}
</script>

<style scoped>
.GitHubEventForm {
    opacity: 0;
    transform: translateY(-10px);
    display: grid;
    gap: 16px;
    max-width: 500px;
    background-color: rgba(var(--bkg-color-nums), 0.5);
    backdrop-filter: blur(25px);
    border-radius: var(--border-radius);
    overflow: hidden;
    padding: 16px;
    animation: appear 500ms ease 500ms forwards;
}

@keyframes appear {
    from {
        opacity: 0;
        transform: scale(2.5);
    }

    to {
        opacity: 1;
        transform: scale(1);
    }
}

@media(max-width: 500px) {
    h1 {
        font-size: 1.875em;
    }
}
</style>