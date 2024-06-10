import arrow_right from "../../../public/images/svg/arrow-right.svg";
import Link from "next/link";
import Image from "next/image";

export default function Testimonials() {
    return (
        <section className="section testimonials" id="testimonials">
            <div className="testimonials-inner">

                <div className="header">
                    <h2>Ils m'ont fait confiance.</h2>
                    <Link href="https://www.google.com/search?sca_esv=58652087346d5a22&hl=fr-FR&gbv=2&sxsrf=ACQVn0_7zDsrcPJAO29TxxO9aKDnU5FzxQ:1710935674823&uds=AMwkrPtyB8MsmozA4Lwzqy2G2HCuZTFdhu9pEqlWGjb4DRqqAhTUlAuvKYfRtltNtelLcjuIFxB7CzU5LyEPj-XXR6u1TMaJ-oIl99DwCRZvFIHY5yu96XAJw9whXWcR5pH0a931p_uw0zlp6rQrQr55RWyuv-0ofRDbk_G26TwPIX6sE-ib7Nt068SLG_m-cM59POT7vBdw&si=AKbGX_oXOTjHK3vNPxrwAU4tsC2W_rsdJDrrSHpqUAOdbOh1q_oRKhs4zQKSce4_ES_EgdKQY2DPUi23UJu19uGV3kjNtAj5yY5SFminHMA0vGeo9NSO1TvK03pVuC-vUkf47NfoOxJ-Est2e8W55Par5avjeJqYzb0bXp1wYjLxWWRAUhpGUmpLS5XzcrleglKg8xaDM_xHvg30aimjip63tu48k1zKXA%3D%3D&q=Adhyanga+%7C+Cabinet+de+Kin%C3%A9siologie+%7C+Massage+Ayurv%C3%A9dique+%7C+Kin%C3%A9siologue+Avis&sa=X&ved=2ahUKEwjV6YGJ5IKFAxVFUaQEHWB8BG4Q_4MLegQIURAL&biw=1664&bih=1035&dpr=1"
                       target="blank" className="circle green little">
                        <Image src={arrow_right} alt="Flèche vers la droite"/>
                    </Link>
                </div>
                <div className="testimonials-container">
                    <div className="testimonial-item">
                        <p className="content">
                            Séance incroyable ! Adeline est une kinésiologue de qualité qui a su m’aider dès ma première
                            séance.
                        </p>
                        <small className="author">
                            Mathias P
                        </small>
                    </div>
                    <div className="testimonial-item">
                        <p className="content">
                            Mille mercis pour ce moment intense et libérateur , ta bienveillance et ton grand cœur. Je
                            reviendrai avec grand plaisir 🙏🙏🙏
                        </p>
                        <small className="author">
                            Natsu Kaway
                        </small>
                    </div>
                    <div className="testimonial-item">
                        <p className="content">
                            Une personne agréable, vraiment bienveillante et à l'écoute
                        </p>
                        <small className="author">
                            Claude Detemple
                        </small>
                    </div>
                </div>

            </div>
        </section>
    )
}
