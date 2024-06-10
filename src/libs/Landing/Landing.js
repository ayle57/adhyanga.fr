import hero_removed from "../../../public/images/heroRemoved.svg";
import Link from "next/link"
import Image from "next/image"

export default function Landing() {
    return (
        <section className="section landing" id="landing">
            <div className="landing-inner">
                <div className="content-container">
                    <h1>Bienvenue sur Adhyanga, votre cabinet de soin sur Saint-Sornin</h1>
                    <p>Je vous souhaite l’accueil, l’amour, le sourire, la gratitude de ce qui se présente sur votre
                        chemin. NAMASTE</p>
                    <div className="btn-container">
                        <Link href="#testimonials" className="btn-primary">Mes Avis</Link>
                        <Link href="#services" className="btn-phantom">Nos Services</Link>
                    </div>
                </div>
                <div className="image-container">
                    <Image src={hero_removed}
                         alt="Adeline Pierrot, praticienne en lithothérapie, ayurvéda et kinésiologie"/>
                </div>
            </div>
        </section>
    )
}
