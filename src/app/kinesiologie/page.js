import arrowRight from "../../../public/images/svg/arrowRight.svg";
import Image from "next/image";
import Link from "next/link";

export default function Home() {
    return (
        <section className="section kinesiologie">
            <div className="kinesiologie-inner">

                <div className="container">
                    <p>La kinésiologie est née à la fin des années 1960, par John Thie avec le Touch For Health basé sur
                        la
                        médecine traditionnelle chinoise, en mettant l’accent sur L’EQUILIBRATION DU POTENTIEL DE LA
                        PERSONNE ;</p>
                    <p>C’est une approche holistique regroupant différentes techniques de travail ( EFT , Touch For
                        Health,
                        stress Release, Core Kine, Corps Energie …) qui ont en commun le test musculaire.</p>
                    <p>Le test musculaire consiste à établir un dialogue direct avec le corps en lui opposant une légère
                        pression à la contraction du muscle en testant un éventuel facteur de stress ou de déséquilibre
                        énergétique.</p>
                    <p>Il permet d’accéder à la mémoire du corps, d’identifier les facteurs contribuant aux blocages et
                        la
                        nature des corrections à effectuer pour les enlever et enfin se révéler au meilleur de son
                        potentiel.</p>
                    <p>Il utilise la relation entre les émotions, le cerveau et les muscles.
                        La kinésiologie peut aider dans de nombreuses situations : stress, fatigue, burn out, problèmes
                        de
                        concentration, troubles du comportement, douleurs musculaires, physiques et émotionnelles,
                        l’apprentissage ainsi que d’autres difficultés, selon vos problématiques et vos objectifs de
                        travail
                        que ce soit pour vous, au sein de votre couple ou en famille.</p>
                    <div className="link-container">
                        <Link href="/#services">Retour</Link>
                        <Image src={arrowRight} alt="Flèche tournée vers la droite"/>
                    </div>
                </div>

            </div>
        </section>
    )
}
