<template>
  <div class="event-container outer-container">
    <img src="../../assets/EventsPage/SoAI_MCP_Banner_1_No_Logo.png" class="mcp-banner" alt="MCP_Banner">
    <div class="content">
      <h1>GitHub Season of AI x ACM</h1>
      <div class="info-container">
        <h3 class="time-date">Nov 21, 2025</h3>
        <h3 class="location">GITC 3700</h3>
      </div>
      <p class="description">
        Join us for Season 5 of GitHub’s Season of AI! Learn how to use MCP (the Model Context
        Protocol) to connect AI models with real-world tools, data, and environments.
      </p>
    </div>
    <h2 class="section-header">MCP</h2>
    <div class="section-container">
      <p>
        Hone your technical and AI skills in a hands on workshop, designed to teach you the ins and outs of MCP,
        including, but not limited to:
      </p>
      <ul>
        <li>What is the Model Context Protocol and its significance in AI Pipelines</li>
        <li>Environment setup, basic servers/clients, integration</li>
        <li>Creating your first MCP server</li>
        <li>Using AI Toolkit with MCP</li>
        <li>Techniques for effective context engineering</li>
      </ul>
      <p>
        <PrimaryButton>
          <a href="https://forms.gle/scUjiszCSeEGu68fA" target="_blank">Sign Up Today!</a>
        </PrimaryButton>
      </p>
    </div>
  </div>
</template>

<script setup>
import PrimaryButton from "../PrimaryButton.vue";
</script>

<style scoped>
.mcp-banner {
  height: min-content;
  margin: 16px 0;
  width: 100%;
  border-radius: var(--border-radius);
}

h1 {
  font-size: 3.5em;
}

.content {
  background-color: #ffffff;
  padding: 32px;
  border-radius: var(--border-radius);
  max-width: 800px;
  text-align: center;
  display: grid;
  gap: 16px;
  margin: 0 auto;
}

[data-theme="dark"] .content {
  background-color: #272727;
}

.time-date,
.location {
  color: var(--red);
}

.content p {
  text-align: left;
}

.info-container {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 32px;
}


ul {
  line-height: 2em;
  list-style-position: inside;
}

.section-container {
  display: grid;
  gap: 16px;
}

@media(max-width: 500px) {
  .mcp-banner {
    margin: 0px;
    border-radius: 0;
  }
}
</style>
