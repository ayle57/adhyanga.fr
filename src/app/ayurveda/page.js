import arrowRight from "../../../public/images/svg/arrowRight.svg";
import Image from "next/image";
import Link from "next/link";

export default function Home() {
    return (
        <section className="section kinesiologie">
            <div className="kinesiologie-inner">

                <div className="container">
                    <p>L’ayurvéda est une pratique millénaire en Inde qui se traduit littéralement par « Connaissance De
                        La Vie »</p>
                    <p>Elle est fondée sur les cinq éléments qui sont l’Ether, l’Air, le Feu, l’Eau et la Terre mais
                        aussi par les trois Doshas : Vata (le mouvement), Pitta (la transformation), et Kapha (la
                        structure) ;</p>
                    <p>Chaque individu à une constitution de chaque Dosha qui le caractérise dès la naissance et qui, si
                        il est en déséquilibre peut-être équilibré par le massage ayurvédique, l’alimentation, le Yoga,
                        la méditation, la respiration et le contact avec la nature.</p>
                    <p>Le massage ayurvédique se prodigue avec de l’huile chaude de sésame permettant une détente
                        profonde du corps et de l’esprit.</p>
                    <p>Il libère les tensions nerveuses et les douleurs dorsales, stimule le système immunitaire et
                        lymphatique.</p>
                    <p>Ce massage offre un bien être total, qu’il s’agisse du corps ou de l’état psychologique.</p>
                    <p>Il peut être pratiqué sur une table de massage ou sur un futon.</p>
                    <p>A part entière pour un soin ou en complémentarité avec la kinésiologie ou la lithothérapie.</p>
                    <div className="link-container">
                        <Link href="/#services">Retour</Link>
                        <Image src={arrowRight} alt="Flèche tournée vers la droite"/>
                    </div>
                </div>

            </div>
        </section>
    )
}
