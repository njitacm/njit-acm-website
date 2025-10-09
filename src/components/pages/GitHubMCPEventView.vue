<template>
  <div class="event-container">
    <div class="mcp_banner">  
      <img src = "../../assets/EventsPage/SoAI_MCP_Banner_1_No_Logo.png" alt="MCP_Banner">
    </div>
    <div class="content">
    <h1>GitHub Season of AI x ACM</h1>
    <h3 class="time-date"></h3>
    <h4 class="location"></h4>
    <p class="description">Join us for Season 5 of GitHub’s Season of AI! Learn how to use MCP (the Model Context Protocol) to connect AI models with real-world tools, data, and environments.</p>
    </div>
    <HorizontalSection>
      <template v-slot:title>MCP</template>
      <template v-slot:content>
        <p>
        Hone your technical and AI skills in a hands on workshop, designed to teach you the ins and outs of MCP, including, but not limited to:
        </p>
        <ul>
            <li>What is the Model Context Protocol and its significance in AI Pipelines</li>
            <li>Environment setup, basic servers/clients, integration</li>
            <li>Creating your first MCP server</li>
            <li>Using AI Toolkit with MCP</li>
            <li>Techniques for effective context engineering</li>
          </ul>
        <p>
          <a href="https://forms.gle/scUjiszCSeEGu68fA" target="_blank">Sign Up Today!</a>
        </p>
      </template>
    </HorizontalSection>
  </div>
</template>

<script setup>
import HorizontalSection from "../HorizontalSection.vue";

</script>

<style>

.mcp_banner {
  width: 85vw;
  margin: 16px auto;
}
.mcp_banner img {
  width: 100%;
  border-radius: 8px;
}

.content {
  width: 85vw;
  text-align: center;
  margin: 16px auto;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-content: center;
}

h1 {
  font-size: 4rem;
}

ul {
  padding-left: 32px;
  padding-top: 8px;
  padding-bottom: 8px;
}

ul li {
  font-size: 1.25rem;
}

</style>
