<template>
    <div class="GitHubEventForm">
        <h1>[GitHub Event Name]</h1>
        <h2>[Date, Location]</h2>
        <p>[Description]</p>
        <PrimaryButton>
            <a href="[google form link here]">Sign Up</a>
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
    display: flex;
    gap: 4px;
}
</style>