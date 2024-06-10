import circle from "../../../public/images/svg/circle.svg";
import Image from "next/image";

export default function Cheque() {
    return (
        <section className="section cheque" id="cheque">
            <div className="cheque-inner">
                <Image src={circle} className="circle-item" alt=""/>
                <h2>Nos chèques cadeaux pour vos évènements.</h2>
            </div>
        </section>
    )
}
