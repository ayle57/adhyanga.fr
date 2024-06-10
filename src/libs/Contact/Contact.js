
import Image from "next/image";
import envelope from "../../../public/images/svg/envelope.svg";
import user from "../../../public/images/svg/user.svg";
import phone from "../../../public/images/svg/phone.svg";

export default function Contact() {
    return (
        <section className="section contact" id="contact">
            <div className="contact-inner">

                <div className="contact-container">
                    <h2>Prendre contact avec nous</h2>
                    <form action="https://formspree.io/f/mdoqqkdl" method="POST">

                        <div className="form-group">
                            <label htmlFor="email">Adresse Email <span>*</span></label>
                            <div className="input">
                                <label htmlFor="email" className="icon-container">
                                    <Image src={envelope} alt="Icone d'enveloppe"/>
                                </label>
                                <input type="email" name="email" id="email" placeholder="jean.dupont@fakemail.com" autoComplete="false"/>
                            </div>
                            <div className="col-6">
                                <div className="form-group">
                                    <label htmlFor="name">Prénom et NOM <span>*</span></label>
                                    <div className="input">
                                        <label className="icon-container" htmlFor="name">
                                            <Image src={user} alt="Icone d'utilisateur"/>
                                        </label>
                                        <input type="text" name="name" id="name" placeholder="Jean DUPONT" autoComplete="false"/>
                                    </div>
                                </div>
                                <div className="form-group">
                                    <label htmlFor="phone">Téléphone <span>*</span></label>
                                    <div className="input">
                                        <label className="icon-container" htmlFor="phone">
                                            <Image src={phone} alt="Icone de combiné téléphonique"/>
                                        </label>
                                        <input type="phone" name="phone" id="phone" placeholder="00 00 00 00 00" autoComplete="false"/>
                                    </div>
                                </div>
                            </div>
                            <div className="form-group d-flex flex-direction-column">
                                <label htmlFor="message">Votre message</label>
                                <textarea name="message" id="message" autoComplete="false"></textarea>
                            </div>
                            <button type="submit" className="btn-primary">Envoyer</button>
                        </div>

                    </form>
                </div>

            </div>
        </section>
    )
}
