<script>
    export let id = "";
    export let label = "";
    export let type = "text"; // "text", "textarea", "checkbox", ou "select"
    export let value = "";
    export let placeholder = "";
    export let variant = "column"; // "column" ou "row"
    export let disabled = false;
    export let error = "";
    export let className = "";
    export let options = []; // Utilisé uniquement pour "select"
</script>

<div class="input-container {variant}">
    {#if type !== "checkbox" && label}
        <label for={id} class="input-label">{label}</label>
    {/if}

    {#if type === "textarea"}
        <textarea
                id={id}
                class="input-field {className}"
                placeholder={placeholder}
                bind:value
                {disabled}
                required
        ></textarea>
    {:else if type === "checkbox"}
        <div class="checkbox-container">
            <input
                    id={id}
                    type="checkbox"
                    bind:checked={value}
                    {disabled}
                    required
            />
            {#if label}
                <label for={id} class="input-label">{label}</label>
            {/if}
        </div>
    {:else if type === "select"}
        <select
                id={id}
                class="input-field {className}"
                bind:value
                {disabled}
                required
        >
            <option value="" disabled selected>Choisissez une option</option>
            {#each options as option}
                <option value={option.value}>{option.label}</option>
            {/each}
        </select>
    {:else}
        <input
                id={id}
                class="input-field {className}"
                type={type}
                placeholder={placeholder}
                bind:value
                {disabled}
                required
        />
    {/if}

    {#if error}
        <div class="error-message">{error}</div>
    {/if}
</div>

<style lang="scss">
  .input-container {
    display: flex;
    flex-direction: column;
    margin-top: 10px;
  }

  .input-container.row {
    flex-direction: row;
    align-items: center;
  }

  .checkbox-container {
    display: flex;
    align-items: center;
  }

  .error-message {
    color: red;
    font-size: 0.875rem;
    margin-top: 5px;
  }
</style>
