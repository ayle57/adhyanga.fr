<script>
    import {services} from "$lib/data/services.json";
    import Input from "$lib/components/shared/Input.svelte";

    let firstname = "";
    let lastname = "";
    let email = "";
    let phone = "";
    let category = "";
    let duration = "";
    let selectedOption = "";
    let appointmentDate = "";
    let appointmentTime = "";
    let message = "";
    let acceptedTerms = false;

    let availableDurations = [];
    let availableOptions = [];

    $: if (category) {
        const selectedService = services.find(service => service.category === category);
        availableDurations = selectedService?.durations || [];
        availableOptions = availableDurations
            .flatMap(d => d.options || [])
            .filter(option => option);
    }

    function handleSubmit(event) {
        event.preventDefault();
        console.log({
            firstname,
            lastname,
            email,
            phone,
            category,
            duration,
            selectedOption,
            appointmentDate,
            appointmentTime,
            message
        });
        alert("Votre rendez-vous a été enregistré !");
    }
</script>

<div class="main-container">
    <header>
        <a href="/#home">
            <img src="/logoRemoved.png" alt="">
        </a>
    </header>
    <div class="form-container">
        <h2>Prendre rendez-vous</h2>
        <form on:submit={handleSubmit}>
            <Input
                    id="firstname"
                    label="Votre prénom"
                    placeholder="Entrez votre prénom"
                    bind:value={firstname}
                    variant="column"
            />
            <Input
                    id="lastname"
                    label="Votre nom de famille"
                    placeholder="Entrez votre nom de famille"
                    bind:value={lastname}
                    variant="column"
            />
            <Input
                    id="email"
                    type="email"
                    label="Votre adresse éléctronique"
                    placeholder="Entrez votre adresse éléctronique"
                    bind:value={email}
                    variant="column"
            />
            <Input
                    id="phone"
                    type="tel"
                    label="Votre numéro de téléphone"
                    placeholder="Entrez votre numéro de téléphone"
                    bind:value={phone}
                    variant="column"
            />

            <Input
                    id="category"
                    type="select"
                    label="Catégorie de service"
                    bind:value={category}
                    options={services.map(service => ({ value: service.category, label: service.category }))}
                    variant="column"
            />

            {#if category}
                <Input
                        id="duration"
                        type="select"
                        label="Durée"
                        bind:value={duration}
                        options={availableDurations.map(d => ({ value: d.duration, label: `${d.duration} (${d.price || "60"}€)` }))}
                        variant="column"
                />
            {/if}

            {#if availableOptions.length > 0}
                <Input
                        id="options"
                        type="select"
                        label="Options"
                        bind:value={selectedOption}
                        options={availableOptions.map(option => ({ value: option, label: option }))}
                        variant="column"
                />
            {/if}

            <Input
                    id="appointmentDate"
                    type="date"
                    label="Date du rendez-vous"
                    bind:value={appointmentDate}
                    variant="column"
            />
            <Input
                    id="appointmentTime"
                    type="time"
                    label="Heure du rendez-vous"
                    bind:value={appointmentTime}
                    variant="column"
            />
            <Input
                    id="message"
                    type="textarea"
                    label="Votre message"
                    placeholder="Ajoutez des détails ou des demandes spécifiques"
                    bind:value={message}
                    variant="column"
            />
            <Input
                    id="acceptedTerms"
                    type="checkbox"
                    label="Veuillez accepter les termes de confidentialité"
                    bind:value={acceptedTerms}
                    variant="row"
            />
            <button class="btn-primary" type="submit" disabled={!acceptedTerms}>
                Prendre rendez-vous
            </button>
        </form>
    </div>
</div>
