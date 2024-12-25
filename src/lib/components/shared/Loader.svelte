<script>
    let isLoading = true;

    setTimeout(() => {
        isLoading = false;
    }, 3000);
</script>

<style lang="scss">
  .loader-section {
    background: #0A2640FF;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: fixed;
    width: 100%;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    height: 100vh;
    z-index: 1000;

    p, h4 {
      color: #fff;
      line-height: 1.8;

      span {
        color: #65E4A3;
        font-weight: 600;
      }
    }
  }

  .loader {
    width: 50px;
    height: 50px;
    display: inline-block;
    margin-bottom: 20px;
    position: relative;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  @keyframes spinreverse {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(-360deg); }
  }


  .loader-double {
    border-radius: 50px;
    border: 6px solid transparent;
    border-top-color: rgb(255, 255, 255);
    border-bottom-color: rgb(255, 255, 255);
    animation: spin 2s linear infinite;

    &::after {
      content: '';
      position: absolute;
      top: 5px;
      bottom: 5px;
      right: 5px;
      left: 5px;
      border-radius: 50px;
      border: 6px solid transparent;
      border-top-color: rgb(255, 255, 255);
      border-bottom-color: rgb(255, 255, 255);
      opacity: 0.8;
      animation: spinreverse 1s linear infinite;
    }
  }
</style>

{#if isLoading}
    <div class="loader-section">
        <span class="loader loader-double"></span>
        <h4>Bienvenue sur <span>adhyanga.fr</span></h4>
        <p>Vous y êtes presque...</p>
    </div>
{:else}
    <slot></slot>
{/if}
