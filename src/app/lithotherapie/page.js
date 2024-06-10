import arrowRight from "../../../public/images/svg/arrowRight.svg";
import Image from "next/image";
import Link from "next/link";

export default function Home() {
    return (
        <section className="section kinesiologie">
            <div className="kinesiologie-inner">

                <div className="container">
                    <p>La lithothérapie est une approche globale du corps et de l’âme, qui permet un travail en
                        profondeur en touchant différents plans que ce soit physique, énergétique, émotionnel, mental et
                        spirituel tout comme le massage ayurvédique.</p>
                    <p>Il existe différents protocoles de soins esséniens créant une harmonisation physico énergétique,
                        de l’état émotionnel, des chakras, du système endocrinien et des méridiens.</p>
                    <p>Le travail avec les pierres permet de libérer des peurs, des émotions/ des pensées négatives et
                        de tout ce qui est discordant en soi.</p>
                    <p>Cela permet un réalignement avec sa vie, son chemin, ce qui réactive et met en lien tous les
                        plans de l’être.</p>
                    <p>A part entière pour un soin ou en complémentarité avec la kinésiologie ou le massage
                        ayurvédique</p>

                    <div className="link-container">
                        <Link href="/#services">Retour</Link>
                        <Image src={arrowRight} alt=""/>
                    </div>
                </div>

            </div>
        </section>
    );
}
