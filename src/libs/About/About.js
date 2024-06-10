import logo from "../../../public/images/logo.png";
import arrowTop from "../../../public/images/svg/arrowRight.svg";
import Image from "next/image";
import Link from "next/link";

export default function About() {
    return (
        <section className="section about" id="about">
            <div className="about-inner">
                <div className="__header">
                    <span>À Propos de moi</span>
                    <h2>Découvrez en plus a propos de moi et de mon entreprise.</h2>
                </div>
                <div className="__body">
                    <div className="left">
                        <p>
                            Depuis 2019, j’ai décidé de me reconvertir et je me suis formée au sein de L’IBK (institut
                            belge
                            de
                            kinésiologie) à Rixensart afin de devenir Kinésiologue. En ressentant les bienfaits
                            psychologiques,
                            physiologiques et anatomiques de ces formations, j’ai voulu proposer des massages
                            ayurvédiques
                            et le
                            travail avec les pierres qui sont complémentaires.
                        </p>
                    </div>
                    <div className="right">
                        <p>
                            « Quand on a un objectif dans la vie, il peut devenir meilleur ou pire cela dépend du chemin
                            que
                            nous choisissons pour l’atteindre et de la manière dont nous le parcourons… »
                        </p>
                        <div className="img-container">
                            <Image src={logo} alt="Logo d'adhyanga"/>
                        </div>
                    </div>
                </div>
                <div className="__footer">
                    <Link href="#contact" className="btn btn-phantom reverse">Contactez moi</Link>
                    <Link href="#landing"
                       target="blank" className="circle green little">
                        <Image src={arrowTop} alt="Flèche vers le haut"/>
                    </Link>
                </div>
            </div>
        </section>
    )
}
